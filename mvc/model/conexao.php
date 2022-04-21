<?php

class Conexao {
	
	protected static $connectionString;

	private static function setConexao()
	{
        self::$connectionString = mysqli_connect('localhost','root','', 'mvc');
        mysqli_set_charset(self::$connectionString, 'utf8');
	}

	public static function getConexao()
	{
		if ( ! isset( self::$connectionString ) )
		{
			self::setConexao();
		}

        return self::$connectionString;
	}


}