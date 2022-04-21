<?php
require_once 'model/Fornecedor.php';

class FornecedorController
{

	public function listar( $view = '' )
	{
		$fornecedor = new Fornecedor();
		$fornecedores = $fornecedor->listAll();
		require_once 'view/fornecedor_'.$view.'.php';
	}

	public function vazio ( $view = '' )
	{
		exit('Tela em branco');
	}

}

?>