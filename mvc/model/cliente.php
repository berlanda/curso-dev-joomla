<?php
class Cliente
{
	private $id;
	private $nome;
	private $conn;

	public function __construct()
	{
		if( ! isset($this->conn) )
		{
			require_once 'model/conexao.php';
			$this->conn = Conexao::getConexao();
		}
	}

	/**
	* ...
	* getters e setters
	* ...
	*
	*/

	public function save()
	{
		// logica para salvar cliente no banco
	}

	public function update()
	{
		// logica para atualizar cliente no banco
	}

	public function remove()
	{
		// logica para remover cliente do banco
	}

	public function listAll()
	{
		// logica para listar toodos os clientes do banco
		$sql = 'SELECT * FROM cliente';		
		$resultados = mysqli_query($this->conn, $sql);

		$rows = [];
		while($row = mysqli_fetch_object($resultados))
		{
		    $rows[] = $row;
		}

		return $rows;
	}

	/**
	* ...
	* outros métodos de abstração de banco
	* ...
	*
	*/
}

?>