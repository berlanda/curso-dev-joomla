<?php
defined('_JEXEC') or die;
class BibliotecaHelper
{
	public static function getActions($categoryId = 0)
	{
		$user  = JFactory::getUser();
		$result  = new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_biblioteca';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_biblioteca.category.'.(int) $categoryId;
			$level = 'category';
		}
		
		$actions = JAccess::getActions('com_biblioteca', $level);
		
		foreach ($actions as $action)
		{
			$result->set($action->name,  $user->authorise($action->name, $assetName));
		}

		return $result;
	}

	public static function addSubmenu($vName = 'livros')
	{
    	JHtmlSidebar::addEntry(
		JText::_('COM_BIBLIOTECA_SUBMENU_LIVROS'),
		'index.php?option=com_biblioteca&view=livros',
		$vName == 'livros'
     	);
		
		JHtmlSidebar::addEntry(
		JText::_('COM_BIBLIOTECA_SUBMENU_CATEGORIES'),
		'index.php?option=com_categories&extension=com_biblioteca',
		$vName == 'categories'
  		);
		
		if ($vName == 'categories')
		{
		    JToolbarHelper::title(
		      JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE',
		      JText::_('com_biblioteca')),
		      'livros-categories');
		}

		JHtmlSidebar::addEntry(
		JText::_('COM_BIBLIOTECA_SUBMENU_AUTORES'),
		'index.php?option=com_biblioteca&view=autores',
		$vName == 'autores'
		);
	}

}