<?php
defined('_JEXEC') or die;
class BibliotecaViewLivros extends JViewLegacy
{

	protected $items;
	protected $state;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->state = $this->get('State');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		
		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{

		JToolbarHelper::title(JText::_('Biblioteca: Gerenciar Livros'), '');

	}

}