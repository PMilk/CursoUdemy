<?php
	
namespace App\Models;
use MF\Model\Model;
class Info extends Model{

	protected $db;

	public function __construct(\PDO $db) {
		$this->db = $db;
	}

	public function getInfos() {
		$query = "SELECT * from TB_INFO";
		return $this->db->query($query)->fetchAll();
	}
}

?>