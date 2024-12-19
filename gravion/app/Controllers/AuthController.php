<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');  // Menampilkan form login
    }

    public function authenticate()
    {
        // Mendapatkan input dari form login
        $username = $this->request->getPost('email'); // Ambil email dari form (ganti 'email' sesuai dengan input)
        $password = $this->request->getPost('password'); // Ambil password dari form
        
        
        $session = session();
        
        if ($username == 'admin@gmail.com' && $password == 'admin123'){
            $session->set('loggedUser', 'Admin');
            $session->set('username', 'Admin');

            return redirect()->to('admin/users');
        }

        // Inisialisasi model dan session
        $model = new UserModel();
        // Cari user berdasarkan email
        $user = $model->where('email', $username)->first(); // Pastikan pencarian berdasarkan email atau username

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password_hash'])) {
                // Jika password cocok, set session
                $session->set('loggedUser', $user['username']);
                $session->set('username', $user['username']);
                $session->set('user_id', $user['user_id']);
                return redirect()->to('/index'); // Redirect ke halaman utama
            } else {
                // Password salah
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('login')->withInput();
            }
        } else {
            // User tidak ditemukan
            $session->setFlashdata('error', 'Email tidak ditemukan!');
            return redirect()->to('login')->withInput();
        }
    }


    public function logout()
    {
        // Menghapus session untuk logout
        $session = session();
        $session->remove('loggedUser');
        $session->remove('username');
        return redirect()->to('/index');  // Mengalihkan ke halaman utama setelah logout
    }
}

