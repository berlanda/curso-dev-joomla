<?php
defined('_JEXEC') or die;
abstract class modLivrosHelper
{
	public static function getAjax()
	{
		$db    = JFactory::getDbo();
		$query  = $db->getQuery(true);
		$query->select(
				'a.id, a.titulo, a.catid, a.autorid, ' .
           		'a.state, a.editora, a.imagem, a.ano_publicacao, a.url, ' .
           		'a.publish_up, a.publish_down, a.ordering'
				
		);
		$query->from($db->quoteName('#__biblioteca_livro').' AS a');
		$query->where('(a.state = 1)');

		$query->select('c.title AS category_title');
		$query->join('LEFT', '#__categories AS c ON c.id = a.catid');

		$query->select('d.nome AS autor_nome');
		$query->join('LEFT', '#__biblioteca_autor AS d ON d.id = a.autorid');

		$dbtype = JFactory::getApplication()->getCfg('dbtype');
		if($dbtype == 'sqlsrv')
		{
		 $query->where("a.imagem NOT LIKE ''");
		}else{
		 $query->where('a.imagem!=""');
		}

		if ($categoryId = JFactory::getApplication()->input->get('catid'))
		{
			$query->where('a.catid = '.(int) $categoryId);
		}
		
		$db->setQuery($query);

		if( JFactory::getApplication()->input->get('format') == 'raw' )
		{
			$result = json_encode($db->loadObjectList());
			return $result;
		}

		return $db->loadObjectList();	
  	}
}