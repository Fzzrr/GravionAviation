<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CreatePasswordController extends Controller
{
    public function index()
    {
        return view('auth/create-password');  
    }

    public function store()
    {
        $session = session();
        $db = \Config\Database::connect();
        $email = $session->get('email'); 

        if (!$email) {
            return redirect()->to('register')->with('error', 'Email tidak ditemukan.');
        }

        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm-password');

        if ($password !== $confirm_password) {
            return redirect()->back()->with('error', 'Password dan konfirmasi tidak cocok.');
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $builder = $db->table('users');
        $builder->set('password_hash', $hashed_password);  
        $builder->where('email', $email);

        if ($builder->update()) {
            $session->remove('email');
            return redirect()->to('/login'); 
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan password.');
        }
    }
}
