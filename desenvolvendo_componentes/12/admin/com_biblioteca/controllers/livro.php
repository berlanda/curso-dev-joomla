<?php
defined('_JEXEC') or die;
class BibliotecaControllerLivro extends JControllerForm
{
	protected function allowAdd($data = array())
	{
		$user = JFactory::getUser();
		$categoryId = JArrayHelper::getValue($data, 'catid', $this->input->getInt('filter_category_id'), 'int');
		$allow = null;
		if ($categoryId)
		{
			$allow = $user->authorise('core.create', $this->option . '.category.' . $categoryId);
		}
		if ($allow === null)
		{
			return parent::allowAdd($data);
		}
		else
		{
			return $allow;
		}
	}

	protected function allowEdit($data = array(), $key = 'id')
	{
		$recordId = (int) isset($data[$key]) ? $data[$key] : 0;
		$categoryId = 0;
		
		if ($recordId)
		{
			$categoryId = (int) $this->getModel()->getItem($recordId)->catid;
		}
		
		if ($categoryId)
		{
			return JFactory::getUser()->authorise('core.edit', $this->option . '.category.' . $categoryId);
		}
		else
		{
			return parent::allowEdit($data, $key);
		}
	}
}