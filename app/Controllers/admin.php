<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;



class admin extends BaseController
{

    public function sendEmailPage()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // You can customize this to get specific users based on your logic

        return view('admin/send_email_page', $data);
    }

    public function confirmEmail()
    {
        $selectedUsers = $this->request->getPost('selected_users');
        $data['selectedUsers'] = is_array($selectedUsers) ? $selectedUsers : [];
        $data['subject'] = $this->request->getPost('subject');
        $data['message'] = $this->request->getPost('message');
    
        return view('admin/confirm_email', $data);
    }
    

    public function sendEmail()
    {
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');
        $selectedUsers = explode(',', $this->request->getPost('selected_users'));
    
        $emailService = \Config\Services::email();
    
        foreach ($selectedUsers as $email) {
            $emailService->setTo($email);
            $emailService->setFrom('admin@ahmadderi.my.id', 'Hasil Test MBTI');
            $emailService->setSubject($subject);
    
            // Load the email message view
            $emailContent = view('admin/email_message', [
                'subject' => $subject,
                'message' => $message,
            ]);
    
            $emailService->setMessage($emailContent);
    
            if ($emailService->send()) {
                // Email sent successfully
                log_message('info', 'Email sent to ' . $email);
            } else {
                // Error sending email
                log_message('error', 'Error sending email to ' . $email);
            }
        }
    
        // Display success message or redirect to a confirmation page
        return 'Emails sent successfully!';
    }
    


    public function dashboard()
    {
        $userModel = new UserModel();
    $data['users'] = $userModel->findAll();

    // Total number of users
    $data['totalUsers'] = count($data['users']);

    // Proses data pengguna untuk dijadikan dataset grafik
    $userData = $this->processUserData($data['users']);
    $data['userData'] = json_encode($userData);

    return view('admin/index', $data);
    }
      // Fungsi untuk memproses data pengguna menjadi dataset grafik
      private function processUserData($users)
      {
          $dataset = [
              'labels' => [],
              'data'   => [],
          ];
  
          foreach ($users as $user) {
              $dataset['labels'][] = $user['username']; // Gunakan data yang sesuai untuk label (contoh: username)
              $dataset['data'][] = $user['id']; // Gunakan data yang sesuai untuk nilai (contoh: id)
          }
  
          return $dataset;
      }

    public function users()
    {


        return view('admin/users');
    }
    }






