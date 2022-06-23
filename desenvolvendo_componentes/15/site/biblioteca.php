<?php
defined('_JEXEC') or die;

$document = JFactory::getDocument();
$cssFile = "./media/com_biblioteca/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);

$controller = JControllerLegacy::getInstance('Biblioteca');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();