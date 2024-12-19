<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class AboutUsController extends Controller
{
    public function index(){
        return view('pages/about');
    }
}