<?php

namespace App\Controllers;

use App\Models\PertanyaanModel;
use App\Models\JawabanModel;
use App\Models\AturanModel;
use App\Models\KepribadianModel;
use App\Models\AturanKepribadianModel;
use App\Models\UserModel;


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

    if (empty($userId)) {
        return redirect()->to('/login')->with('error', 'Anda harus login untuk menjawab pertanyaan.');
    }

    $jawabanData = $this->request->getPost('jawaban');

    if (empty($jawabanData)) {
        return redirect()->to('users/pertanyaan')->with('error', 'Pilih setidaknya satu jawaban.');
    }

    $idPengguna = $userId;
    $jawabanModel = new JawabanModel();
    $aturanModel = new AturanModel();

    foreach ($jawabanData as $idPertanyaan => $jawaban) {
        $data = [
            'IDPengguna' => $idPengguna,
            'IDPertanyaan' => (int) $idPertanyaan,
            'JawabanPengguna' => $jawaban,
            'WaktuJawaban' => date('Y-m-d H:i:s'),
        ];

        $jawabanModel->insert($data);
    }

    $hasilKepribadian = $this->analisisForwardChaining($idPengguna);

    if ($hasilKepribadian) {
        // Kirim email dengan soal dan jawaban
        $this->kirimEmailSoalJawaban($idPengguna);

        return redirect()->to('user/pertanyaan')->with('success', 'Jawaban berhasil dikirim. Hasil Kepribadian: ' . $hasilKepribadian);
    } else {
        return redirect()->to('user/pertanyaan')->with('error', 'Kepribadian tidak dapat ditentukan.');
    }
}

private function kirimEmailSoalJawaban($idPengguna)
{
    $userModel = new \App\Models\UserModel();
    $email = $userModel->getEmailById($idPengguna);

    // Periksa apakah email pengguna ditemukan
    if (!$email) {
        log_message('error', 'Email pengguna tidak ditemukan.');
        return;
    }

    $subject = 'Jawaban Anda';
    $message = 'Berikut adalah jawaban Anda:';

    $jawabanModel = new JawabanModel();
    $jawabanPengguna = $jawabanModel->getJawabanByPengguna($idPengguna);

    // Periksa apakah ada jawaban pengguna
    if (empty($jawabanPengguna)) {
        log_message('error', 'Tidak ada jawaban pengguna yang ditemukan.');
        return;
    }

    foreach ($jawabanPengguna as $tipePertanyaan => $jawabanUser) {
        $pertanyaanModel = new PertanyaanModel();
        $pertanyaan = $pertanyaanModel->find($tipePertanyaan);

        // Periksa apakah pertanyaan ditemukan
        if (!$pertanyaan) {
            log_message('error', 'Pertanyaan dengan ID ' . $tipePertanyaan . ' tidak ditemukan.');
            continue; // Lanjutkan ke pertanyaan berikutnya jika pertanyaan tidak ditemukan
        }

        $message .= "\n\nPertanyaan: " . $pertanyaan['PertanyaanText'];
        $message .= "\nJawaban Anda: " . $jawabanUser;
    }

    $emailService = \Config\Services::email();

    // Konfigurasi email
    $emailService->setTo($email);
    $emailService->setFrom('admin@ahmadderi.my.id', 'Hasil jawaban anda'); // Sesuaikan dengan alamat email dan nama Anda
    $emailService->setSubject($subject);
    $emailService->setMessage($message);

    // Kirim email
    if ($emailService->send()) {
        log_message('info', 'Email berhasil dikirim ke ' . $email);
    } else {
        log_message('error', 'Email gagal dikirim: ' . $emailService->printDebugger());
    }
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
