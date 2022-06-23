<?php
defined('_JEXEC') or die;
class BibliotecaController extends JControllerLegacy
{
	 protected $default_view = 'livros';
	 public function display($cachable = false, $urlparams = false)
	 {
	 	require_once JPATH_COMPONENT.'/helpers/biblioteca.php';
	   	parent::display();
	   	return $this;
	 }
}