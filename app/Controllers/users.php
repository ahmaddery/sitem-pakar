<?php

namespace App\Controllers;

use App\Models\PertanyaanModel;
use App\Models\UserModel;
use App\Models\JawabanModel;
use App\Models\AturanModel;
use App\Models\KepribadianModel;
use App\Models\AturanKepribadianModel;

class Users extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        if (empty($userId)) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk menjawab pertanyaan.');
        }

        $model = new PertanyaanModel();
        $data['pertanyaan'] = $model->findAll();

        return view('user/pertanyaan', $data);
    }

    public function jawab()
    {
        $session = session();
        $userId = $session->get('user_id');
        $userEmail = $session->get('user_email');
    
        if (empty($userId)) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk menjawab pertanyaan.');
        }
    
        $jawabanData = $this->request->getPost('jawaban');
    
        if (empty($jawabanData)) {
            return redirect()->to('/pertanyaan')->with('error', 'Pilih setidaknya satu jawaban.');
        }
    
        $idPengguna = $userId;
        $jawabanModel = new JawabanModel();
        $pertanyaanModel = new PertanyaanModel();
        $aturanModel = new AturanModel();
    
        // Email Configuration
        $emailService = service('email');
        $emailService->setTo($userEmail);
        $emailService->setFrom('admin@ahmadderi.my.id', 'Respon jawaban Kepribadian');
        $emailService->setSubject('Jawaban Pertanyaan');
    
        // Email Message
        $emailMessage = '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jawaban Pertanyaan</title>
        <style>
            body {
                font-family: \'Arial\', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
    
            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
    
            h1 {
                color: #333333;
            }
    
            p {
                color: #555555;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
            <h1>Jawaban Pertanyaan Anda</h1>
            <p>Berikut adalah jawaban Anda:</p>';
    
        // Database Transaction
        $db = \Config\Database::connect();
        $db->transBegin();
    
        try {
            foreach ($jawabanData as $idPertanyaan => $jawaban) {
                $pertanyaan = $pertanyaanModel->find($idPertanyaan);
                $data = [
                    'IDPengguna' => $idPengguna,
                    'IDPertanyaan' => (int) $idPertanyaan,
                    'JawabanPengguna' => $jawaban,
                    'WaktuJawaban' => date('Y-m-d H:i:s'),
                ];
                
                // Insert data into the database
                $jawabanModel->insert($data);
    
                // Append question and answer to the email message
                $emailMessage .= "<p><strong>Pertanyaan:</strong> {$pertanyaan['PertanyaanText']}</p>";
                $emailMessage .= "<p><strong>Jawaban:</strong> $jawaban</p>";
                $emailMessage .= '<hr>';
            }
    
            // Commit the transaction
            $db->transCommit();
        } catch (\Exception $e) {
            // Rollback the transaction on error
            $db->transRollback();
            
            // Log or display the error message
            log_message('error', 'Error inserting data into the database: ' . $e->getMessage());
    
            return redirect()->to('user/pertanyaan')->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    
        $emailMessage .= '<p>Terima kasih atas partisipasi Anda!</p>
        </div>
    </body>
    
    </html>';
    
        // Set email message
        $emailService->setMessage($emailMessage);
    
        // Send the email
        $emailService->send();
    
        $hasilKepribadian = $this->analisisForwardChaining($idPengguna);
    
        if ($hasilKepribadian) {
            return redirect()->to('user/include/coldown')->with('success', 'Jawaban berhasil dikirim. Hasil Kepribadian: ' . $hasilKepribadian);
        } else {
            return redirect()->to('user/include/coldown')->with('error', 'Kepribadian tidak dapat ditentukan.');
        }
    }
    
    
    public function coldown()
    {
        // Check if the user is logged in
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login'); // Redirect to login page if not logged in
        }

        $userId = $session->get('user_id');

        // Load the user model
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);

        // Pass user data to the view
        return view('/user/include/coldown', ['user' => $user]);
    }
    

    private function analisisForwardChaining($idPengguna)
{
    $aturanModel = new AturanModel();
    $jawabanModel = new JawabanModel();

    // Ambil semua aturan kepribadian dari database
    $aturanKepribadian = $aturanModel->findAll();

    $jawabanPengguna = $jawabanModel->getJawabanByPengguna($idPengguna);

    // Debug: Tambahkan pesan log
    log_message('debug', 'Jawaban Pengguna: ' . print_r($jawabanPengguna, true));
    foreach ($aturanKepribadian as $rule) {
        // Debug: Tambahkan pesan log
        log_message('debug', 'Analisis aturan: ' . $rule['Kondisi']);

        if ($this->evaluasiAturan($rule['Kondisi'], $jawabanPengguna)) {
            // Debug: Tambahkan pesan log
            log_message('debug', 'Kepribadian berhasil ditentukan: ' . $rule['TipeKepribadian']);

            $this->simpanKepribadian($rule['TipeKepribadian'], $idPengguna);
            $this->simpanAturanKepribadian($rule['TipeKepribadian']);
            return $rule['TipeKepribadian'];
        }
    }

    // Debug: Tambahkan pesan log
    log_message('debug', 'Kepribadian tidak dapat ditentukan.');

    return false;
}

    private function evaluasiAturan($kondisi, $jawabanPengguna)
    {
        $aturanSatuan = explode('AND', $kondisi);
    
        foreach ($aturanSatuan as $kondisiSatuan) {
            $kondisiSatuan = trim($kondisiSatuan);
            $explodedCondition = explode('>', $kondisiSatuan);
    
            if (count($explodedCondition) < 2) {
                return false;
            }
    
            list($tipePertanyaan, $jawabanHarap) = array_map('trim', $explodedCondition);
    
            // Debug: Tambahkan pesan log
            log_message('debug', 'Tipe Pertanyaan: ' . $tipePertanyaan);
            log_message('debug', 'Jawaban Harap: ' . $jawabanHarap);
    
            // Periksa apakah kunci $tipePertanyaan ada dalam $jawabanPengguna
            if (!array_key_exists($tipePertanyaan, $jawabanPengguna)) {
                log_message('debug', 'Undefined array key: ' . $tipePertanyaan);
                return false;
            }
    
            log_message('debug', 'Jawaban User: ' . $jawabanPengguna[$tipePertanyaan]);
    
            $jawabanUser = $jawabanPengguna[$tipePertanyaan];
    
            if ($jawabanUser !== $jawabanHarap) {
                return false;
            }
        }
    
        return true;
    }

    private function simpanKepribadian($tipeKepribadian, $idPengguna)
    {
        $kepribadianModel = new KepribadianModel();
        $data = [
            'Kode' => 'K' . sprintf('%02d', $this->generateUniqueKode()),
            'Kepribadian' => $tipeKepribadian,
            'TipeKepribadian' => implode(', ', explode(', ', $tipeKepribadian)),
            'Keterangan' => $tipeKepribadian,
            'Deskripsi' => null,
            'IDPengguna' => $idPengguna, // Tambahkan ID Pengguna pada data kepribadian
        ];
    
        $kepribadianModel->insert($data);
    }

    private function simpanAturanKepribadian($tipeKepribadian)
    {
        $aturanKepribadianModel = new AturanKepribadianModel();
        $data = [
            'IDAturan' => $this->getAturanIDByTipeKepribadian($tipeKepribadian),
            'IDKepribadian' => $tipeKepribadian,
        ];
        $aturanKepribadianModel->insert($data);
    }

    private function getAturanIDByTipeKepribadian($tipeKepribadian)
    {
        $aturanModel = new AturanModel();
        $result = $aturanModel->where('TipeKepribadian', $tipeKepribadian)->first();

        if ($result) {
            return $result['IDAturan'];
        } else {
            return null;
        }
    }

    private function generateUniqueKode()
    {
        // Implement your logic to generate a unique code
        // For example, you can use a timestamp or a combination of user ID and current time
        return time(); // Placeholder, replace with your implementation
    }
}