<?php
defined('_JEXEC') or die;
class BibliotecaController extends JControllerLegacy
{
	 protected $default_view = 'livros';
	 public function display($cachable = false, $urlparams = false)
	 {
	   require_once JPATH_COMPONENT.'/helpers/biblioteca.php';
	   $view   = $this->input->get('view', 'livros');
	   $layout = $this->input->get('layout', 'default');
	   $id     = $this->input->getInt('id');
	   if ($view == 'livro' && $layout == 'edit' && !$this->checkEditId('com_biblioteca.edit.livro', $id))
	   {
	     $this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
	     $this->setMessage($this->getError(), 'error');
	     $this->setRedirect(JRoute::_('index.php?option=com_biblioteca&view=livros', false));
	     return false;
	   }
	   parent::display();
	   return $this;
	 }
}