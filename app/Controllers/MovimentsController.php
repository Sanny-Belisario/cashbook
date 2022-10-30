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
}
