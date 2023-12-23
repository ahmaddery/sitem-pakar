<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class manageusers extends Controller
{
    public function __construct()
    {
        // Load the UserModel in the constructor
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Fetch all users from the database
        $data['users'] = $this->userModel->findAll();

        // Pass the data to the view
        return view('admin/users/index', $data);
    }

}
