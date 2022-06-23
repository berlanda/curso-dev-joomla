<?php
defined('_JEXEC') or die;
class BibliotecaViewLivro extends JViewLegacy
{
   protected $items;
   public function display($tpl = null)
   {
      $this->items = $this->get('Items');

      $app = JFactory::getApplication();
      $params = $app->getParams();
      $this->assignRef('params', $params);

      $breadcrumb = $app->getPathWay();
      $breadcrumb->addItem( $this->items[0]->titulo );

      if (count($errors = $this->get('Errors')))
      {
         JError::raiseError(500, implode("\n", $errors));
         return false;
      }
      parent::display($tpl);
   }
}