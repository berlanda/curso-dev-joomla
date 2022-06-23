<?php
defined('_JEXEC') or die;
class BibliotecaHelper
{

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