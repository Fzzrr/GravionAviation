<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $session = session();  
        $model = new UserModel();

        if ($session->get('loggedUser')) {
            $user = $model->where('username', $session->get('loggedUser'))->first();

            return view('pages/index', ['user' => $user]);
        } else {
            return view('pages/index', ['user' => null]);
        }
    }
}
