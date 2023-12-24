<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('index', 'Home::index');

$routes->get('login', 'Auth::login'); // Rute untuk halaman login
$routes->get('auth/login', 'Auth::login'); // Rute untuk halaman login
$routes->post('auth/login', 'Auth::login'); // Rute untuk proses login (POST request)

$routes->get('register', 'Auth::register'); // Rute untuk halaman register
$routes->post('auth/register', 'Auth::register'); // Rute untuk proses registrasi (POST request)
$routes->get('auth/logout', 'Auth::logout');

$routes->get('forgot_password', 'Auth::forgotPassword');
$routes->post('auth/forgotPassword', 'Auth::forgotPassword');
$routes->get('reset_password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('auth/processResetPassword', 'Auth::processResetPassword');

$routes->get('user/profile', 'UserController::profile');
$routes->get('user/coldown', 'UserController::profile');
$routes->get('user/edit-profile', 'UserController::editProfile');
$routes->post('user/update-profile', 'UserController::updateProfile');
//route untuk admin
$routes->get('admin', 'admin::dashboard');
$routes->get('admin/users', 'admin::users');

//aturan di halaman admin 
$routes->get('admin/aturan', 'AturanController::index');
 $routes->get('admin/aturan/(:num)', 'AturanController::index/$1');
 $routes->get('aturan/detail/(:num)', 'AturanController::detail/$1');
 $routes->get('aturan/create', 'AturanController::create');
 $routes->post('aturan/store', 'AturanController::store');
 $routes->get('aturan/edit/(:num)', 'AturanController::edit/$1');
 $routes->post('aturan/update/(:num)', 'AturanController::update/$1');
 $routes->get('aturan/delete/(:num)', 'AturanController::delete/$1');
 // managemen users di halaman admin 
 $routes->get('admin/users/index', 'manageusers::index');


// route untuk menangani  pertanyaan di halaman admin 
$routes->get('admin/pertanyaan/index', 'Pertanyaan::index');
$routes->get('admin/pertanyaan/form_create', 'Pertanyaan::create');
$routes->post('admin/pertanyaan/store', 'Pertanyaan::store');
$routes->get('admin/pertanyaan/form_edit/(:segment)', 'Pertanyaan::edit/$1');
$routes->post('admin/pertanyaan/update/(:segment)', 'Pertanyaan::update/$1');
$routes->get('admin/pertanyaan/delete/(:segment)', 'Pertanyaan::delete/$1');

// route untuk menangani  kepribadian  di halaman admin 
$routes->get('admin/kepribadian', 'Kepribadian::index');
$routes->get('admin/kepribadian/index', 'Kepribadian::index');


$routes->get('admin/kepribadian/form_create', 'Kepribadian::create');
$routes->post('admin/kepribadian/store', 'Kepribadian::store');
$routes->get('admin/kepribadian/form_edit/(:segment)', 'Kepribadian::edit/$1');
$routes->post('admin/kepribadian/update/(:segment)', 'Kepribadian::update/$1');
$routes->get('admin/kepribadian/delete/(:segment)', 'Kepribadian::delete/$1');


//read data pertanyaan di halaman users
$routes->get('user/pertanyaan', 'users::index');
$routes->post('/users/jawab', 'Users::jawab');
$routes->get('/user/include/coldown', 'users::coldown');
$routes->post('/users/simpan-aturan-kepribadian', 'Users::simpanAturanKepribadian');

// read and delete data jawaban untuk halaman admin 
$routes->get('/admin/jawaban', 'AdminJawaban::index');
$routes->get('/admin/jawaban/(:num)', 'AdminJawaban::index/$1');
$routes->get('/admin/jawaban/delete/(:num)', 'AdminJawaban::delete/$1');



$routes->get('admin/send_email_page', 'Admin::sendEmailPage');
$routes->post('admin/confirm_Email', 'Admin::confirmEmail');
$routes->post('admin/sendEmail', 'Admin::sendEmail');


//http://localhost:8080/admin/send_email_page