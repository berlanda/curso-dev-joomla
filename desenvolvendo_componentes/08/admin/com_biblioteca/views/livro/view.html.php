<?php
defined('_JEXEC') or die;
class BibliotecaViewLivro extends JViewLegacy
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
    $isNew = ($this->item->id == 0);

    JToolbarHelper::title('Biblioteca: gerenciar livro', '');

    if ( $user->authorise('core.create', 'com_biblioteca') )
    {
      JToolbarHelper::apply('livro.apply');
      JToolbarHelper::save('livro.save');
      JToolbarHelper::save2new('livro.save2new');
    }

    if (!$isNew && $user->authorise('core.create', 'com_biblioteca') )
    {
      JToolbarHelper::save2copy('livro.save2copy');
    }

    if (empty($this->item->id))
    {
      JToolbarHelper::cancel('livro.cancel');
    }
    else
    {
      JToolbarHelper::cancel('livro.cancel', 'JTOOLBAR_CLOSE');
    }

  }
}