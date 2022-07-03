<?php
defined('_JEXEC') or die;
class BibliotecaViewLivros extends JViewLegacy
{
   public function display($tpl = null)
   {
      $app = JFactory::getApplication();
      $params = $app->getParams();
      $this->assignRef('params', $params);
      $this->pageclass_sfx = '';
      parent::display($tpl);
   }
}