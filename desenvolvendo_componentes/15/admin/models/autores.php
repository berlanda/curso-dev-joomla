<?php
defined('_JEXEC') or die;
class BibliotecaModelAutores extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'nome', 'a.nome',
				'state', 'a.state',
	            'publish_up', 'a.publish_up',
	            'publish_down', 'a.publish_down',
	            'ordering', 'a.ordering'
				);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest(
			$this->context.'.filter.search', 'filter_search');
       	$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest(
			$this->context.'.filter.state', 'filter_state',
			'', 'string');
    	$this->setState('filter.state', $published);
	    
	    parent::populateState('a.ordering', 'asc');
	}

	protected function getListQuery()
	{
		$db    = $this->getDbo();
		$query  = $db->getQuery(true);
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.nome, ' .
           		'a.state, ' .
           		'a.publish_up, a.publish_down, a.ordering'
				)
			);
		$query->from($db->quoteName('#__biblioteca_autor').' AS a');

		$published = $this->getState('filter.state');
	    if (is_numeric($published))
	    {
	      $query->where('a.state = '.(int) $published);
	    }
	    elseif ($published === '')
	    {
	      $query->where('(a.state IN (0, 1))');
	    }

		$search = $this->getState('filter.search');
		if (!empty($search))
		{
		  	if (stripos($search, 'id:') === 0)
		  	{
		    	$query->where('a.id = '.(int) substr($search, 3));
		  	}
		  	else
		  	{
		   		$search = $db->Quote('%'.$db->escape($search, true).'%');
		    	$query->where('(a.nome LIKE '.$search.')');
			}
		}

		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));

		return $query;
	}

}