<?php
$classe = @$_GET['classe'];
$metodo = @$_GET['acao'];
$view = @$_GET['visao'];

if ( empty($classe) )
{
	$classe = 'cliente';
}
if ( empty($metodo) )
{
	$metodo = 'listar';
}
if ( empty($view) )
{
	$view = 'view';
}

require_once 'controller/'.$classe.'.php';
$classe .= 'Controller';
$obj = new $classe();
$obj->$metodo( $view );