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
		JText::_('Livros'),
		'index.php?option=com_biblioteca&view=livros',
		$vName == 'livros'
     	);
		
		JHtmlSidebar::addEntry(
		JText::_('Categorias'),
		'index.php?option=com_categories&extension=com_biblioteca',
		$vName == 'categories'
  		);

	}

}