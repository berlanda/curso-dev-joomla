<?php
defined('_JEXEC') or die;
class BibliotecaViewLivros extends JViewLegacy
{

	public function display($tpl = null)
	{
		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{

		JToolbarHelper::title(JText::_('Biblioteca: Gerenciar Livros'), '');

	}

}