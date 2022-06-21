<?php
defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Biblioteca');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();