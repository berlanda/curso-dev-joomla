<?php
defined('_JEXEC') or die('Restricted Access');

use Joomla\CMS\Factory;

$db = Factory::getDbo();

$me = Factory::getUser();

if ($me->id == 0)
{
	echo "Autentique-se para testar o módulo.";
}
else
{
	$email = $me->email; 
	// change the case of the email address
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

		$conditions = array($db->quoteName('id') . ' = ' . $me->id); 

		$query->update($db->quoteName('#__users'))->set($fields)->where($conditions);

		echo $db->replacePrefix((string) $query);
		echo '<br>'; echo '<br>';

	//usando query diretamente, de forma menos recomendada
	$query = 'UPDATE #__users SET email = %s WHERE id = %d';
	$query = sprintf($query, $db->quote($new_email), $me->id);
	echo $db->replacePrefix( $query );
	echo '<br>'; echo '<br>';

	//usando query diretamente, de forma mais recomendada
	$query = 'UPDATE %s SET %s = %s WHERE %s = %d';
	$query = sprintf($query,  $db->quoteName('#__users'), $db->quoteName('email'), $db->quote($new_email), $db->quoteName('id'), $me->id);

	echo $db->replacePrefix( $query );
	echo '<br>'; echo '<br>';

	$db->setQuery($query);

	if ($result = $db->execute())
	{
		echo $success_msg;
	}
}