<?php
defined('_JEXEC') or die;
JLoader::register('modLivrosHelper', __DIR__ . '/helper.php');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_livros', $params->get('layout', 'default'));