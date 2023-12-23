<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function profile()
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
        return view('user/profile', ['user' => $user]);
    }
    public function editProfile()
    {
        helper('form');
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
        return view('user/edit_profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        // Check if the user is logged in
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login'); // Redirect to login page if not logged in
        }

        $userId = $session->get('user_id');

        // Load the user model
        $userModel = new UserModel();

        // Validate the form data (you can add validation rules here)

        // Update the user profile
        $userModel->update($userId, [
            'usia'   => $this->request->getPost('usia'),
            'gender' => $this->request->getPost('gender'),
        ]);

        // Redirect to the profile page after updating
        return redirect()->to('/user/profile');
    }
}
