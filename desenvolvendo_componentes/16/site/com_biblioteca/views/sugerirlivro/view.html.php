<?php
defined('_JEXEC') or die;
class BibliotecaViewSugerirlivro extends JViewLegacy
{
  protected $item;
  protected $form;
  public function display($tpl = null)
  {
     $this->item = $this->get('Item');
     $this->form = $this->get('Form');
     $this->itemId = JFactory::getApplication()->input->getInt('itemId', 0);


     if (count($errors = $this->get('Errors')))
     {
        JError::raiseError(500, implode("\n", $errors));
        return false;
     }

     $breadcrumb = JFactory::getApplication()->getPathWay();
    $breadcrumb->addItem( "Sugerir um livro" );


     parent::display($tpl);
  }
}