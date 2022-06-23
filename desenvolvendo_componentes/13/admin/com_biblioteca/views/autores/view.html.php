<?php
defined('_JEXEC') or die;
class BibliotecaViewAutores extends JViewLegacy
{
	protected $items;
	protected $state;
	protected $pagination;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->state = $this->get('State');
		$this->pagination  = $this->get('Pagination');

		BibliotecaHelper::addSubmenu('autores');
		
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
		$state  = $this->get('State');
		$canDo  = BibliotecaHelper::getActions( 0 );
		$user = JFactory::getUser();
		$bar = JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_BIBLIOTECA_MANAGER_AUTORES'), '');

		if (count($user->getAuthorisedCategories('com_biblioteca', 'core.create')) > 0)
     	{
			JToolbarHelper::addNew('autor.add');
		}
		
		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('autor.edit');
		}
		if ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('autores.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('autores.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('autores.archive');
			JToolbarHelper::checkin('autores.checkin');
		}
		
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'autores.delete', 'JTOOLBAR_EMPTY_TRASH');
		}
		elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('autores.trash');
		}

		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_biblioteca');
		}
		JHtmlSidebar::setAction('index.php?option=com_biblioteca&view=autores');
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
	        'a.title' => JText::_('JGLOBAL_TITLE'),
	        'a.id' => JText::_('JGRID_HEADING_ID')
		);
    }

}