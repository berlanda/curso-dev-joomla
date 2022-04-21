<?php
require_once 'model/Cliente.php';

class ClienteController
{

	public function listar( $view = '' )
	{
		$cliente = new Cliente();
		$clientes = $cliente->listAll();
		require_once 'view/cliente_'.$view.'.php';
	}

}

?>