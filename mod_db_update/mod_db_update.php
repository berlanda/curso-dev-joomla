<?php
defined('_JEXEC') or die('Restricted Access');

use Joomla\CMS\Factory;

$db = Factory::getDbo();
$usuario_logado = Factory::getUser();
$input = Factory::getApplication()->input;

if ($usuario_logado->id == 0)
{
	echo "Autentique-se para testar o módulo.";
}
else
{
	$email = $usuario_logado->email; 

	// altera o endereco de email para caixa baixa ou para caixa alta
	$email_uppercase = strtoupper($email);
	if ($email == $email_uppercase)
	{
		$new_email = strtolower($email);
		$success_msg = 'E-mail alterado para caixa baixa.';
	}
	else
	{
		$new_email = $email_uppercase;
		$success_msg = 'E-mail alterado para CAIXA ALTA.';

	}

	//usando objeto Query
	$query = $db->getQuery(true);
	$fields = array($db->quoteName('email') . " = '{$new_email}'");
	$conditions = array($db->quoteName('id') . ' = ' . $usuario_logado->id); 
	$query->update($db->quoteName('#__users'))->set($fields)->where($conditions);

	echo '<p>Código:</p>';
	echo '<code>';
	echo '$fields = array($db->quoteName(\'email\') . " = \'{$new_email}\'");';
	echo '<br>$conditions = array($db->quoteName(\'id\') . \' = \' . $usuario_logado->id); ';
	echo '<br>$query->update($db->quoteName(\'#__users\'))->set($fields)->where($conditions);';
	echo '</code>';
	echo '<br><br><p>Consulta resultante:</p>';
	echo '<code>';
	echo $db->replacePrefix((string) $query);
	echo '</code>';
	echo '<br>'; echo '<br>';

	//usando query diretamente, de forma menos recomendada
	$query = 'UPDATE #__users SET email = %s WHERE id = %d';
	$query = sprintf($query, $db->quote($new_email), $usuario_logado->id);

	echo '<p>Código:</p>';
	echo '<code>';
	echo '$query = \'UPDATE #__users SET email = %s WHERE id = %d\';';
	echo '<br>$query = sprintf($query, $db->quote($new_email), $usuario_logado->id);';
	echo '</code>';
	echo '<br><br><p>Consulta resultante:</p>';
	echo '<code>';
	echo $db->replacePrefix((string) $query);
	echo '</code>';
	echo '<br>'; echo '<br>';

	//usando a query diretamente, mas de uma forma mais recomendada
	$query = 'UPDATE '.$db->quoteName('#__users')
				.' SET ' . $db->quoteName('email') . ' = %s'
				.' WHERE ' . $db->quoteName('id') . ' = %d';
	$query = sprintf($query, $db->quote($new_email), $usuario_logado->id);

	$db->setQuery($query);

	if ($result = $db->execute())
	{
		echo '<strong>' . $success_msg . '</strong>';
		echo '<br>'; echo '<br>';
	}

	//testes com insercao e remocao
	$profile = JUserHelper::getProfile($usuario_logado->id);
	$query = $db->getQuery(true);

	if( is_null( $profile->profile['message'] ) )
	{
		// Colunas 
		$columns = array('user_id', 'profile_key', 'profile_value', 'ordering');

		// Valores para inserir
		$values = array($usuario_logado->id, $db->quote('profile.message'), $db->quote('Inserindo um registro usando o método insert().'), 1);

		// Preparação da query de INSERT
		$query
		    ->insert($db->quoteName('#__user_profiles'))
		    ->columns($db->quoteName($columns))
		    ->values(implode(',', $values));

		echo '<h3>Inserindo dados:</h3>';

		echo '<p>Exemplo de INSERT:</p>';
		echo '<code>';
		echo str_replace( ',', ', ', $db->replacePrefix( $query ));
		echo '</code>';
		echo '<br><br>';

		// setQuery utilizando novo objeto query populado e execução da query
		$db->setQuery($query);
		$db->execute();

		// Exemplo de código para inserir novo ID
		//$new_row_id = $db->insertid();
		//campo acima vai retornar zero porque a tabela #__user_profiles não tem chave primária
		//echo '<br>'; echo '<br>';
		//echo 'Novo item inserido: '.$new_row_id;

		//Obtendo campos adicionais do perfil de usuário
		$profile = JUserHelper::getProfile($usuario_logado->id);

		//Exibindo mensagem
		echo '<p>Valor do campo profile.message da tabela #__user_profiles: <em>'.$profile->profile['message'].'</em></p>';

		//message with object
		$profile_obj = new stdClass();
		$profile_obj->user_id = $usuario_logado->id;
		$profile_obj->profile_key='profile.message2';
		$profile_obj->profile_value= $input->get('msg2', 'Inserting a record using StdClass()', 'string');
		$profile_obj->ordering=2;


		// Insert the object into the user profile table.
		$result = JFactory::getDbo()->insertObject('#__user_profiles', $profile_obj);
		$profile = JUserHelper::getProfile($usuario_logado->id);
		echo '<br><br>';

		echo '<p>Valor do campo profile.message2 da tabela #__user_profiles: <em>'.$profile->profile['message2'].'</em><br><br>(pode ser substituído por parâmetro msg2, enviado via GET ou SET)</p>';


	}
	else
	{
		echo '<h3>Removendo dados:</h3>';

		echo '<p>Exemplos de DELETE:</p>';

		//forma sem objeto JDatabaseQuery
		$query = 'DELETE FROM ' . $db->quoteName('#__user_profiles')
					. ' WHERE ' . $db->quoteName('user_id') . ' = %d'
					. ' AND ' . $db->quoteName('profile_key') . ' = %s';

		$query = sprintf($query, $usuario_logado->id, $db->quote('profile.message2') );

		$db->setQuery($query);

		echo '<code>';
		echo str_replace( ',', ', ', $db->replacePrefix( $query ));
		echo '</code>';
		echo '<br><br>';

		$result = $db->execute();


		//forma com objeto JDatabaseQuery
		$query = $db->getQuery(true);

		// delete all custom keys for user 
		$conditions = array(
		    $db->quoteName('user_id') . ' = ' . $usuario_logado->id, 
		    $db->quoteName('profile_key') . ' LIKE ' . $db->quote('profile.message%')
		);

		$query->delete($db->quoteName('#__user_profiles'));
		$query->where($conditions);
		$db->setQuery($query);

		echo '<code>';
		echo str_replace( ',', ', ', $db->replacePrefix( $query ));
		echo '</code>';
		echo '<br><br>';

		$result = $db->execute();		

	}


}