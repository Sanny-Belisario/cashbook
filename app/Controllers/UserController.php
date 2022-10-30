<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function __construct(){
        $modelUser = model('app/Models/User');
    }

    public function index()
    {
        return view('Templates/default/index');
    }

    public function login()
    {
        return view('user/login');
    }

    public function auth()
    {
        if(isset($_POST['user']['send_login'])){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $m = model('UserModel');
            $userEmail = $m->where('email', $email)->findAll();
            $userPass = $m->where('password', $password)->findAll();
            $user = [$userEmail, $userPass];
            print_r($user);
            //$session->set($user);
        }
        header("Refresh: 2; url =".base_url());
    }

    public function logout()
    {
        
    }
}
