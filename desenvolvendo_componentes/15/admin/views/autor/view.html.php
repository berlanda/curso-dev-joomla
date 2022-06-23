<?php
defined('_JEXEC') or die;
class BibliotecaViewAutor extends JViewLegacy
{
  protected $item;
  protected $form;
  
  public function display($tpl = null)
  {
    $this->item    = $this->get('Item');
    $this->form    = $this->get('Form');
    if (count($errors = $this->get('Errors')))
    {
       JError::raiseError(500, implode("\n", $errors));
       return false;
    }
    $this->addToolbar();
    parent::display($tpl);
  }

  protected function addToolbar()
  {
    JFactory::getApplication()->input->set('hidemainmenu', true);

    $user = JFactory::getUser();
    $userId = $user->get('id');
    $isNew = ($this->item->id == 0);
    $canDo = BibliotecaHelper::getActions(0);

    JToolbarHelper::title(JText::_('COM_BIBLIOTECA_MANAGER_AUTOR'), '');

    if ($canDo->get('core.edit')||$canDo->get('core.create') ) 
    {
      JToolbarHelper::apply('autor.apply');
      JToolbarHelper::save('autor.save');
    }
    
    if ( $canDo->get('core.create') )
    {
      JToolbarHelper::save2new('autor.save2new');
    }

    if (!$isNew && $canDo->get('core.create') )
    {
      JToolbarHelper::save2copy('autor.save2copy');
    }

    if (empty($this->item->id))
    {
      JToolbarHelper::cancel('autor.cancel');
    }
    else
    {
      JToolbarHelper::cancel('autor.cancel', 'JTOOLBAR_CLOSE');
    }

  }
}