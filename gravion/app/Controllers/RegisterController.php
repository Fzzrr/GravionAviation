<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store()
{
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $model = new UserModel();

    if ($model->where('email', $email)->first()) {
        return redirect()->to('/register')->with('error', 'Email sudah terdaftar.');
    }

    if ($model->where('username', $username)->first()) {
        return redirect()->to('register')->with('error', 'Username sudah terdaftar.');
    }

    session()->set('username', $username);  
    session()->set('email', $email);  

    $data = [
        'username' => $username,
        'email' => $email,
        'password' => '',  
    ];
    $model->insert($data);

    return redirect()->to('create-password')->with('success', 'Registrasi berhasil. Silakan buat password.');
}
}
