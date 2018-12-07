<?php

namespace App\Models;

use MF\Model\Model;

class Seguidor extends Model{
	private $id;
	private $id_usuario;
	private $id_usuario_seguido;

	public function __get($att) {
        return $this->$att;
    }

    public function __set($att,$valor) {
        $this->$att = $valor;
    }

    public function seguirUsuario() {
    	$query = "insert into usuarios_seguidores(id_usuario,id_usuario_seguido) values(:id_usuario,:id_usuario_seguido)";
    	$stmt = $this->db->prepare($query);
    	$stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
    	$stmt->bindValue(':id_usuario_seguido',$this->__get('id_usuario_seguido'));
    	$stmt->execute();

    	return true;
    }

    public function deixarSeguirUsuario() {
    	$query = "delete from usuarios_seguidores where id_usuario = :id_usuario AND id_usuario_seguido = :id_usuario_seguido";
    	$stmt = $this->db->prepare($query);
    	$stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
    	$stmt->bindValue(':id_usuario_seguido',$this->__get('id_usuario_seguido'));
    	$stmt->execute();
    	return true;

    }
}

?>