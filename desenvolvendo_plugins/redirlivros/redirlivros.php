<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');


class plgSystemRedirLivros extends JPlugin {

	private $_app;
	private $_db;

	public function __construct(&$subject, $config = array()) {
		$this->_app = JFactory::getApplication();
		$this->_db = JFactory::getDbo();
		parent::__construct($subject, $config);
	}

	public function onAfterInitialise() {
		
		if ($this->_app->isAdmin())
		{
			return true;
		}

		$uri = JFactory::getURI();
		$absolute_url = $uri->toString();
		$path = explode('/',$uri->getPath());
		$stringlivro = $path[count($path)-1];

		$stringlivro = $this->_db->quote($this->_db->escape($stringlivro, true), false);
		$stringlivro = mb_strtolower($stringlivro);

		$query = $this->_db->getQuery(true);

		$query->select(
			'id, url'
		);

		$query->from($this->_db->quoteName('#__biblioteca_livro'));
		$query->where('(state IN (1))');
		$query->where('REPLACE(LOWER(titulo)," ","") = '.$stringlivro);
		$this->_db->setQuery($query, 0, 1);

		try
		{
			$rows = $this->_db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			$rows = array();
			JFactory::getApplication()->enqueueMessage(
				JText::_('JERROR_AN_ERROR_HAS_OCCURRED'),
			'error');
		}
		
		if (count($rows) == 0)
		{
			return false;		
		}

		$row = $rows[0];

		$tipo_url = $this->params->get("redirect", "interno");

		if ($tipo_url == 'interno')
		{
			JFactory::getApplication()->redirect(
				JRoute::_('index.php?option=com_biblioteca&view=livro&id='. $row->id)
			);

		}

		if ($tipo_url == 'externo')
		{
			JFactory::getApplication()->redirect(
				$row->url
			);
		}

		return true;
	}


	
}
