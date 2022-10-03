<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct(){
        $modelUser = model('user');
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
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $this->modelUser->where('email', $email);
        $this->modelUser->where('password', $password);
        $this->modelUser->find();
    }

    public function logout()
    {
        
    }
}
