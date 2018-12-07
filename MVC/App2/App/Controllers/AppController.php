<?php

namespace App\Controllers;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {
	public function timeline() {
		$this->validaAutenticacao();	
		$tweet = Container::getModel('tweet');
		$tweet->__set('id_usuario',$_SESSION['id']);
		$tweets = $tweet->getAll();
		$this->view->tweets = $tweets;
		$this->render('timeline'); 
	}

	public function tweet() {
		$this->validaAutenticacao();
		$tweet = Container::getModel('tweet');
		$tweet->__set('tweet',$_POST['tweet']);
		$tweet->__set('id_usuario',$_SESSION['id']);
		$tweet->salvar();
	}

	public function validaAutenticacao() {
		session_start();
		if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') 
		{
			header('location: /?login=erro');
		}
	}

	public function quemSeguir() {
		$this->validaAutenticacao();

		$pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';
		$usuarios = array();

		if($pesquisarPor != '') {
			$usuario = Container::getModel('usuario');
			$usuario->__set('nome',$pesquisarPor);
			$usuario->__set('id',$_SESSION['id']);
			$usuarios = $usuario->getAll();
		}
		$this->view->usuarios = $usuarios;

		$this->render('quemSeguir');
	}

	public function acao() {
		$this->validaAutenticacao();

		$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

		$id_usuario_seguido = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';
		
		$seguidor = Container::getModel('seguidor');

		$seguidor->__set('id_usuario',$_SESSION['id']);
		$seguidor->__set('id_usuario_seguido',$id_usuario_seguido);
		if($acao == 'seguir') {
			$seguidor->seguirUsuario();
		}else if($acao == 'deixar_de_seguir') {
			$seguidor->deixarSeguirUsuario();
		}
	}
}
?>