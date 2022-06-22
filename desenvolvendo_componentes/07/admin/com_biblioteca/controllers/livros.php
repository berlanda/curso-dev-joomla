<?php
defined('_JEXEC') or die;
class BibliotecaControllerLivros extends JControllerAdmin
{
	public function getModel($name = 'Livro', $prefix = 'BibliotecaModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}	
}