<?php

namespace App\Controllers;
use MF\Controller\Action;
use App\Connection;
use MF\Model\Container;

class IndexController extends Action {
	
	public function index() {
		if($this->validaAutenticacao()) {
			header('location: /timeline');
		}else {
			$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
			$this->render('index');
		}
			
	}

	public function validaAutenticacao() {
		session_start();
		if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
			return false;
		}else {
			return true;
		}
	}


	public function inscreverse() {
		if($this->validaAutenticacao()) {
			header('location: /timeline');
		}else {
			$this->view->usuario = array (
				'nome' => '',
				'email' => '',
				'senha' => '',
			);
			$this->view->erroCadastro = false;
			$this->render('inscreverse');
		}
	}
	
	public function registrar() {
		//receber os dados
		if($this->validaAutenticacao()) {
			header('location: /timeline');
		}
		if(!isset($_POST['nome']) && !isset($_POST['email']) && !isset($_POST['senha'])) {
			header('location: /inscreverse');
		}
		$usuario = Container::getModel('usuario');
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',md5($_POST['senha']));
		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){
			$usuario->salvar();
			$this->render('cadastro');
		}else {
			$this->view->usuario = array (
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);
			$this->view->erroCadastro = true;
			$this->render('inscreverse');
		}

	}
}


?>