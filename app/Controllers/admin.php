<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;



class admin extends BaseController
{
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






