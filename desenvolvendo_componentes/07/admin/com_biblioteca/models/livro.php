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


}
