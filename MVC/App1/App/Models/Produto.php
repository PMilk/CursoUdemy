<?php
	
namespace App\Models;

use MF\Model\Model;

class Produto extends Model{

	public function getProdutos() {
		$query = "SELECT * from TB_PRODUTOS";
		return $this->db->query($query)->fetchAll();
	}
}

?>