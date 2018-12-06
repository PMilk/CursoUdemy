<?php

namespace App\Controllers;
use MF\Controller\Action;
use App\Connection;
use App\Models\Produto;
use App\Models\Info;

use MF\Model\Container;

class IndexController extends Action {
	
	public function index() {
		//$this->view->dados = array('sofa','cadeira','cama');
		
		$produto = Container::getModel('Produto');

		$produtos  = $produto->getProdutos();
		$this->view->dados = $produtos;

		$this->render('index','layout1');
	}

	public function sobre_nos() {
		//instanciar a conexao
		$info = Container::getModel('Info');

		$infos = $info->getInfos();

		$this->view->dados = $infos;

		$this->render('sobreNos','layout1');
	}

	
}


?>