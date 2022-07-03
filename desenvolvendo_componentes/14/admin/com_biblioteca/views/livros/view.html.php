<?php
defined('_JEXEC') or die;
class BibliotecaViewLivros extends JViewLegacy
{

	protected $items;
	protected $state;
	protected $pagination;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination  = $this->get('Pagination');
		$this->checked_out  = '';

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		BibliotecaHelper::addSubmenu('livros');
		
		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$state  = $this->get('State');
		$canDo  = BibliotecaHelper::getActions( $state->get('filter.category_id') );
		$user = JFactory::getUser();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('Biblioteca: Gerenciar Livros'), '');

		if (count($user->getAuthorisedCategories('com_biblioteca', 'core.create')) > 0)
     	{
			JToolbarHelper::addNew('livro.add');
		}
		
		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('livro.edit');
		}
		if ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('livros.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('livros.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('livros.archive');
			JToolbarHelper::checkin('livros.checkin');
		}
		
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'livros.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('livros.trash');
		}

		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_biblioteca');
		}
		JHtmlSidebar::setAction('index.php?option=com_biblioteca&view=livros');
       	JHtmlSidebar::addFilter(
        	JText::_('JOPTION_SELECT_PUBLISHED'),
        	'filter_state',
        	JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'),
			'value', 'text', $this->state->get('filter.state'), true)
       );
	}

	protected function getSortFields()
    {
       	return array(
	        'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
	        'a.state' => JText::_('JSTATUS'),
	        'a.titulo' => JText::_('JGLOBAL_TITLE'),
	        'a.id' => JText::_('JGRID_HEADING_ID')
		);
    }
}