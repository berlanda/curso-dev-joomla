<?php
defined('_JEXEC') or die;

class PlgContentLinklivros extends JPlugin
{
	protected static $modules = array();

	protected static $mods = array();

	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{

		if ($context === 'com_finder.indexer')
		{
			return true;
		}

		if (strpos($article->text, '{livro') === false )
		{
			return true;
		}

		// Expression to search for (positions)
		$regex = '/{livro\s(.*?)}/i';


		// Find all instances of plugin and put in $matches for loadposition
		// $matches[0] is full pattern match, $matches[1] is the position
		preg_match_all($regex, $article->text, $matches, PREG_SET_ORDER);



		// No matches, skip this
		if ($matches)
		{
			foreach ($matches as $match)
			{
				$livro = trim($match[1]);

				$output = $this->_load($livro);

				if (($start = strpos($article->text, $match[0])) !== false)
				{
					$article->text = substr_replace($article->text, $output, $start, strlen($match[0]));
				}

			}
		}

	}


	protected function _load($livro)
	{
		$db     = JFactory::getDbo();
		$query = $db->getQuery(true);


		$query->select(
			'a.id'
		);

		$query->from($db->quoteName('#__biblioteca_livro').' AS a');
		$query->where('(a.state IN (1))');

		$busca = $db->quote('%' . $db->escape($livro, true) . '%', false);

		$query->where(
				'(a.titulo LIKE ' . $busca . ')'
			)
			->order('a.id DESC');


		$db->setQuery($query, 0, 1);
		$id = $db->loadResult();

		if(!$id)
		{
			return $livro;
		}

		$url = JRoute::_("index.php?option=com_biblioteca&view=livro&id=".$id);
		$target = $this->params->get('target', '')? 'target="' . $this->params->get('target', '') . '"' : '';
		$link = '<a href="' . $url . '" ' . $target . '>'.$livro.'</a>';

		return $link;
	}

}
