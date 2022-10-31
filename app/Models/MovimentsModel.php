<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentsModel extends Model
{
    protected $table      = 'moviment';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['description', 'date', 'value', 'type', 'user_id'];

    public function list($dateStart, $dateEnd){
        $sql="SELECT * FROM moviment";

		$retorno=$this->db->query($sql, null);
		// while($item=$retorno->fetch(PDO::FETCH_ASSOC)){
		// 	$resultado[]=$item;
		// }
        foreach ($retorno->getResult() as $row) {
            $resultado[] = $row;
        }
		return $resultado;
    }
    
    public function cash_balance(){
        $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
        $result=$this->db->query($sql, null);
        $input;
        $output;
        foreach ($result->getResult() as $row) {
            $input = $row->input;
        }
        //$input=$result->fetch(PDO::FETCH_ASSOC);
        $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
        $result=$this->db->query($sql, null);
        foreach ($result->getResult() as $row) {
            $output = $row->output;
        }
        //$output=$result->fetch(PDO::FETCH_ASSOC);
        return $input-$output;
    }

    public function dashboard() {
		//Busca no banco de dados
        $sql='SELECT DISTINCT m.date as data, (SELECT SUM(value) FROM moviment WHERE date = m.date and type = "input") AS valorInput, (SELECT SUM(value) FROM moviment WHERE date = m.date and type = "output") AS valorOutput FROM moviment m;';
        $result=$this->db->query($sql, null);
        foreach ($result->getResult() as $row) {
            $array[] = $row;
        }
        // while($input=$result->fetch(PDO::FETCH_ASSOC)){
		// 	$array[] = $input;
		// };
        return $array;
    }

    // public function add($data){
    //     $sql = "INSERT INTO moviment (date, description, value, type, user_id) VALUE (?, ?, ?, ?, 1)"; 
    //     $result = $this->db->query($sql, [$data->date, $data['description'], $data['value'], $data['type']]);
    // }
}