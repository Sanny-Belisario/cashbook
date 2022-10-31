<?php

namespace App\Controllers;

class MovimentsController extends BaseController
{
    public function index()
    {
        $model = model("MovimentsModel");
        $dateStart = null;
        $dateEnd = null;
        $listMoviments=$model->list($dateStart, $dateEnd);
		$data['moviments']=$listMoviments;
        $itens = $model->cash_balance();
		$data['cash_balance']=$itens;
        return view('moviments/index', $data);
    }

    // public function form() 
    // {
    //     return view("moviments/form");
    // }

    // public function add() 
    // {
    //     $params = [
    //         $date = $this->request->getPost('date'),
    //         $description = $this->request->getPost('description'),
    //         $value = $this->request->getPost('value'),
    //         $type = $this->request->getPost('type')
    //     ];

    //     $model = model("MovimentsModel");
    //     $model->add($params);
    //     header("url =".base_url()."/moviments");
    // }
}
