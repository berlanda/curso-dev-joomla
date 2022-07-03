<?php
defined('_JEXEC') or die;
class BibliotecaControllerSugerirlivro extends JControllerForm
{
	protected function allowAdd($data = array())
	{
		return false;
	}

	protected function allowSave($data = array())
	{
		return true;
	}

	protected function allowEdit($data = array(), $key = 'id')
	{
		return false;
	}

	public function cancel( $key = null)
	{
		$this->setRedirect( JURI::base() );
		return true;
	}
}