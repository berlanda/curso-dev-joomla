<?php
defined('_JEXEC') or die;
class BibliotecaControllerPreview extends JControllerAdmin
{
	public function getModel($name = 'Preview', $prefix = 'BibliotecaModel',
								$config = array('ignore_request' => true))
    {
       $model = parent::getModel($name, $prefix, $config);
       return $model;
	}
}