<?php
defined('_JEXEC') or die;
class BibliotecaModelLivro extends JModelAdmin
{
	protected $text_prefix = 'COM_BIBLIOTECA';

	public function getTable($type = 'Livro', $prefix =
		'BibliotecaTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();
		$form = $this->loadForm('com_biblioteca.livro', 'livro',
			array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_biblioteca.edit.livro.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	protected function prepareTable($table)
	{
		$table->titulo    = htmlspecialchars_decode($table->titulo, ENT_QUOTES);
	}

   protected function canDelete($record)
   {
      if (!empty($record->id))
      {
         if ($record->state != -2)
         {
            return;
         }
         $user = JFactory::getUser();
         if ($record->catid)
         {
            return $user->authorise('core.delete', 'com_biblioteca.category.'.(int) $record->catid);
         }
         else
         {
           return parent::canDelete($record);
         }
      }
   }
   protected function canEditState($record)
   {
      $user = JFactory::getUser();
      if (!empty($record->catid))
      {
         return $user->authorise('core.edit.state', 'com_biblioteca.category.'.(int) $record->catid);
      }
      else
      {
         return parent::canEditState($record);
      }
   }

}
