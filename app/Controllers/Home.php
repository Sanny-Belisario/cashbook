<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = model("MovimentsModel");
        $moviments['moviments'] = $model->dashboard();
        return view('home/home', $moviments);
    }
}
