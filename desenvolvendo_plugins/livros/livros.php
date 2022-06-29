<?php
defined('_JEXEC') or die;


class PlgSearchLivros extends JPlugin
{

	protected $autoloadLanguage = false;

	public function onContentSearchAreas()
	{
		static $areas = array(
			'livros' => 'Livros'
		);

		return $areas;
	}

	public function onContentSearch($text, $phrase = '', $ordering = '', $areas = null)
	{
		
		$db     = JFactory::getDbo();
		$app    = JFactory::getApplication();
		$user   = JFactory::getUser();
		$groups = implode(',', $user->getAuthorisedViewLevels());

		if (is_array($areas) && !array_intersect($areas, array_keys($this->onContentSearchAreas())))
		{
			return array();
		}

		$sContent  = $this->params->get('search_content', 1);
		$sArchived = $this->params->get('search_archived', 1);
		$limit     = $this->params->def('search_limit', 50);
		$state     = array();

		if ($sContent)
		{
			$state[] = 1;
		}

		if ($sArchived)
		{
			$state[] = 2;
		}

		if (empty($state))
		{
			return array();
		}

		$text = trim($text);

		if ($text === '')
		{
			return array();
		}

		$section = JText::_('Livros');

		switch ($ordering)
		{
			case 'alpha':
				$order = 'a.titulo ASC';
				break;

			case 'category':
				$order = 'c.title ASC, a.name ASC';
				break;

			case 'popular':
			case 'newest':
			case 'oldest':
			default:
				$order = 'a.titulo DESC';
		}

		$text = $db->quote('%' . $db->escape($text, true) . '%', false);

		$query = $db->getQuery(true);


		$query->select(
			'a.id, a.editora, a.descricao, a.titulo AS title, \'\' AS created, '
				. $query->concatenate(array('a.titulo', 'a.editora', 'a.ano_publicacao'), ',') . ' AS text,'
				. $query->concatenate(array($db->quote($section), 'c.title'), ' / ') . ' AS section,'
				. '\'2\' AS browsernav'
		);

		$query->from($db->quoteName('#__biblioteca_livro').' AS a');
		$query->where('(a.state IN ('.implode($state, ', ').'))');

		$query->select('c.title AS category_title');
		$query->join('LEFT', '#__categories AS c ON c.id = a.catid');

		$query->select('d.nome AS autor_nome');
		$query->join('LEFT', '#__biblioteca_autor AS d ON d.id = a.autorid');


		$query->where(
				'(a.titulo LIKE ' . $text . ' OR d.nome LIKE ' . $text . ' OR a.editora LIKE ' . $text
					. ' OR a.descricao LIKE ' . $text  . ')'
			)
			->order($order);


		$db->setQuery($query, 0, $limit);

		try
		{
			$rows = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			$rows = array();
			JFactory::getApplication()->enqueueMessage(JText::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
		}

		if ($rows)
		{
			foreach ($rows as $key => $row)
			{
				$rows[$key]->href  = JRoute::_("index.php?option=com_biblioteca&view=livro&id=".$row->id);
				$rows[$key]->text  = '';
				$rows[$key]->text .= $row->autor_nome ? 'De: ' . $row->autor_nome . '. ' : '';
				$rows[$key]->text .= $row->editora ? 'Editora: '.$row->editora . '. ' : '';
				$rows[$key]->text .= $row->descricao ? strip_tags($row->descricao) : '';
			}
		}

		return $rows;
	}
}
