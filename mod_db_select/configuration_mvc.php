<?php
//		Necessário configurar outra base de dados para habilitar o parametro
// 		show_mvc_database_example, nas configurações do template (Consultar MVC Database).
//		Jogue este arquivo na raiz do site e configure os parametros de acordo, alterando as 
// 		lihas 13 e 14 ou copiando os parametros necessarios do configuration.php e incluindo-os 
// 		com as devidas alterações, a partir da linha 15

require_once( JPATH_SITE . '/configuration.php' );

class JConfigMvc extends JConfig {

	//alterar aqui
	public $db = 'mvc';
	public $dbprefix = '';
	//incluir parametros alterados aqui

	//fim inclusão parametros alterados

	public function returnOptions()
	{
		$option = array(); //prevent problems

		$option['dbtype']   = $this->dbtype;
		$option['driver']   = $this->dbtype;
		$option['host']     = $this->host;
		$option['user']     = $this->user;
		$option['password'] = $this->password;
		$option['db'] 		= $this->db;
		$option['database']	= $this->db;
		$option['dbprefix'] = $this->dbprefix;
		$option['prefix'] 	= $this->dbprefix;

		return $option;
	}

}