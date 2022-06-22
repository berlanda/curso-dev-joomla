<?php
defined('_JEXEC') or die;
class BibliotecaModelAutor extends JModelAdmin
{
	protected $text_prefix = 'COM_BIBLIOTECA';

	public function getTable($type = 'Autor', $prefix =
		'BibliotecaTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();
		$form = $this->loadForm('com_biblioteca.autor', 'autor',
			array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_biblioteca.edit.autor.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	protected function prepareTable($table)
	{
		$table->nome    = htmlspecialchars_decode($table->nome, ENT_QUOTES);
	}

   protected function canDelete($record)
   {
      if (!empty($record->id))
      {
         if ($record->state != -2)
         {
            return;
         }
         
         return parent::canDelete($record);
         
      }
   }

}
