<?php
defined('_JEXEC') or die;
class BibliotecaController extends JControllerLegacy
{
	 protected $default_view = 'livros';
	 public function display($cachable = false, $urlparams = false)
	 {
	   echo 'Parabéns, você instalou seu primeiro componente. Tela de frontend.';
	   return;
	 }
}