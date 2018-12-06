<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model{

    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __get($att) {
        return $this->$att;
    }

    public function __set($att,$valor) {
        $this->$att = $valor;
    }

    public function salvar() {
        $query = "insert into usuarios(nome,email,senha) values(:nome,:email,:senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->execute();
        
        return $this;
    }
   
    public function validarCadastro() {
        $valido = true;
            if(strlen($this->nome) < 3){
                $valido = false;
            }
            if(strlen($this->senha) < 3){
                $valido = false;
            }
            if(strlen($this->email) < 3){
                $valido = false;
            }

        return $valido;
    }
    //validas se um cadastro pode ser feito

    //recuperar um usuario por e-mail
    public function getUsuarioPorEmail() {
        $query = "select nome,email from usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
?>