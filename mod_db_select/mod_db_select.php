<?php
defined('_JEXEC') or die('Restricted Access');

use Joomla\CMS\Factory;

$db = Factory::getDbo();
$usuario_logado = Factory::getUser();

echo '<h4>Consulta a uma única tabela</h4>';

//consulta
$query = $db->getQuery(true);

echo '<h5>Consulta aninhada</h5>';
echo '<blockquote>';

$query->select($db->quoteName(array('name', 'email')))
	->from($db->quoteName('#__users'))
	->where($db->quoteName('id') . ' != ' . $db->quote($usuario_logado->id))
	->order($db->quoteName('name') . ' ASC');

$db->setQuery($query);

//exibicao em tela do mesmo codigo acima
echo '<p>Código:</p><code>';
echo '$query->select(\$db->quoteName(array(\'name\', \'email\')))'
	.'<br>->from(\$db->quoteName(\'#__users\'))'
	.'<br>->where(\$db->quoteName(\'id\') . \' != \' . $db->quote($usuario_logado->id))'
	.'<br>->order(\$db->quoteName(\'name\') . \' ASC\')';
echo '</code>';


echo '<br><br><p>Consulta resultante:</p><code>';
echo $db->replacePrefix((string) $query);
echo '</code>';
echo '</blockquote>';


echo '<h5>Consulta "simples"</h5>';
echo '<blockquote>';
$query2 = 'SELECT name, email'
			.' FROM #__users'
			.' WHERE id != %d'
			.' ORDER BY name ASC';

//ou melhor ainda:
$query2 = 'SELECT '.$db->quoteName('name').', '.$db->quoteName('email')
			.' FROM '.$db->quoteName('#__users')
			.' WHERE id != %d'
			.' ORDER BY '.$db->quoteName('name').' ASC';

$query2 = sprintf($query2, $usuario_logado->id);


echo '<p>Código:</p><code>';
echo '\'SELECT \'.$db->quoteName(\'name\').\', \'.$db->quoteName(\'email\')';
echo '<br>.\' FROM \'.$db->quoteName(\'#__users\')';
echo '<br>.\' WHERE id != %d';
echo '<br>.\' ORDER BY \'.$db->quoteName(\'name\').\' ASC\'';
echo '</code>';


echo '<br><br><p>Consulta resultante:</p><code>';
echo $query2;
echo '</code>';
echo '</blockquote>';

echo '<h5>Exibição do resultado com loadAssocList()</h5>';
echo '<blockquote>';

echo '<p>Código:</p><code>';
echo '$results = $db->loadAssocList();';
echo '<br>...<br>';
echo 'foreach ($results as $row)<br>';
echo 'echo \'&lt;li&gt; . $row[\'name\'] . ,  . $row[\'email\'] . &lt;/li&gt;\';';
echo '<br>...<br>';
echo '</code>';

//resultado
$results = $db->loadAssocList();
echo '<br><p>Resultado:</p>';
echo '<ul>';
foreach ($results as $row)
{
	echo "<li>" . $row['name'] . ", " . $row['email'] . "</li>";
}
echo '</ul>';
echo '</blockquote>';

echo '<h4>Consulta a múltiplas tabelas</h4>';

//consulta
$query = $db->getQuery(true);

echo '<h5>Consulta aninhada</h5>';
echo '<blockquote>';

$query
    ->select(array('a.*', 'b.username', 'b.name', 'c.*', 'd.title category_title'))
    ->from($db->quoteName('#__content', 'a'))
    ->join('INNER', $db->quoteName('#__users', 'b') . ' ON ' . $db->quoteName('a.created_by') . ' = ' . $db->quoteName('b.id'))
    ->join('LEFT', $db->quoteName('#__user_profiles', 'c') . ' ON ' . $db->quoteName('b.id') . ' = ' . $db->quoteName('c.user_id'))
    ->join('RIGHT', $db->quoteName('#__categories', 'd') . ' ON ' . $db->quoteName('a.catid') . ' = ' . $db->quoteName('d.id'))
    ->where($db->quoteName('b.username') . ' LIKE ' . $db->quote('a%'))
    ->orWhere($db->quoteName('b.username') . ' LIKE ' . $db->quote('b%'))
    ->order($db->quoteName('a.hits') . ' DESC')
    ->group($db->quoteName('a.title'))
    ->setLimit('10');

$db->setQuery($query);

echo '<p>Código:</p><code>';
echo '$query'
    .'<br>->select(array(\'a.*\', \'b.username\', \'b.name\', \'c.*\', \'d.title category_title\'))'
    .'<br>->from($db->quoteName(\'#__content\', \'a\'))'
    .'<br>->join(\'INNER\', $db->quoteName(\'#__users\', \'b\') . \' ON \' . $db->quoteName(\'a.created_by\') . \' = \' . $db->quoteName(\'b.id\'))'
    .'<br>->join(\'LEFT\', $db->quoteName(\'#__user_profiles\', \'c\') . \' ON \' . $db->quoteName(\'b.id\') . \' = \' . $db->quoteName(\'c.user_id\'))'
    .'<br>->join(\'RIGHT\', $db->quoteName(\'#__categories\', \'d\') . \' ON \' . $db->quoteName(\'a.catid\') . \' = \' . $db->quoteName(\'d.id\'))'
    .'<br>->where($db->quoteName(\'b.username\') . \' LIKE \' . $db->quote(\'a%\'))'
    .'<br>->orWhere($db->quoteName(\'b.username\') . \' LIKE \' . $db->quote(\'b%\'))'
    .'<br>->order($db->quoteName(\'a.hits\') . \' DESC\')'
    .'<br>->group($db->quoteName(\'a.title\'))'
    .'<br>->setLimit(\'10\');';
echo '</code>';

echo '<br><br><p>Consulta resultante:</p><code>';
echo $db->replacePrefix((string) $query);
echo '</code>';
echo '</blockquote>';

echo '<h5>Exibição do resultado</h5>';
echo '<blockquote>';

echo '<p>Código:</p><code>';
echo '$results = $db->loadObjectList();';
echo '<br>...<br>';
echo 'foreach ($results as $row)<br>';
echo 'echo \'&lt;li&gt; Artigo &quot;\' . $row->title . \'&quot;, categoria &quot;\' . $row->category_title . \'&quot;, \' . $row->hits . \' visualizações, criado por \' . $row->username . \'&lt;/li&gt;\';';
echo '<br>...<br>';
echo '$result = $db->loadObject();';
echo '<br>...<br>';
echo 'echo \'&lt;li&gt; Artigo &quot;\' . $result->title . \'&quot;, categoria &quot;\' . $result->category_title . \'&quot;, \' . $result->hits . \' visualizações, criado por \' . $result->username . \'&lt;/li&gt;\';';
echo '<br>...<br>';
echo '</code>';

//resultado objectList
$results = $db->loadObjectList();
echo '<br><p>Resultado com loadObjectList():</p>';
echo '<ul>';
foreach ($results as $row)
{
	echo "<li> Artigo &quot;" . $row->title . "&quot;, categoria &quot;" . $row->category_title . "&quot;, " . $row->hits . " visualizações, criado por " . $row->username . "</li>";
}
echo '</ul>';

//resultado object
$result = $db->loadObject();
echo '<p>Resultado com loadObject():</p>';
echo '<ul>';
echo "<li> Artigo &quot;" . $result->title . "&quot;, categoria &quot;" . $result->category_title . "&quot;, " . $result->hits . " visualizações, criado por " . $result->username . "</li>";
echo '</ul>';

echo '</blockquote>';

echo '<h4>Consulta de resultado com valor único</h4>';

//consulta
echo '<h5>Consulta aninhada</h5>';
echo '<blockquote>';

$query = $db
    ->getQuery(true)
    ->select('COUNT(*)')
    ->from($db->quoteName('#__categories'))
    ->where($db->quoteName('published')) . " = 1";

echo '<p>Código:</p><code>';
echo '$db'
    .'<br>->getQuery(true)'
    .'<br>->select(\'COUNT(*)\')'
    .'<br>->from($db->quoteName(\'#__categories\'))'
    .'<br>->where($db->quoteName(\'published\')) . " = 1";';
echo '</code>';

echo '<br><br><p>Consulta resultante:</p><code>';
echo $db->replacePrefix((string) $query);
echo '</code>';
echo '</blockquote>';


echo '<h5>Exibição do resultado</h5>';
echo '<blockquote>';

echo '<p>Código:</p><code>';
echo '$count = $db->loadResult();';
echo '<br>...<br>';
echo 'foreach ($results as $row)<br>';
echo 'echo \'&lt;li&gt;\' . $count . \'  categorias publicadas neste site.&lt;/li&gt;\';';
echo '<br>...<br>';
echo '</code>';

//resultado object
$count = $db->loadResult();
echo '<br><p>Resultado:</p>';
echo '<ul>';
echo "<li>" . $count . " categorias publicadas neste site.</li>";
echo '</ul>';

echo '</blockquote>';

if( $params->get('show_mvc_database_example', 0) == 1 )
{
	echo '<h5>Consulta em outra base de dados</h5>';
	echo '<blockquote>';

	require_once( JPATH_SITE . '/configuration_mvc.php' );
	$configMvc = new JConfigMvc();
	$dbMvc = JDatabaseDriver::getInstance( $configMvc->returnOptions() );

	$query = $dbMvc
	    ->getQuery(true)
	    ->select('*')
	    ->from( $dbMvc->quoteName('cliente') );

	$dbMvc->setQuery($query);

	echo '<p>Código:</p><code>';
	echo 'require_once( JPATH_SITE . \'/configuration_mvc.php\' );<br>';
	echo '$configMvc = new JConfigMvc();<br>';
	echo '$dbMvc = JDatabaseDriver::getInstance( $configMvc->returnOptions() );<br><br>';

	echo '$dbMvc'
	    .'<br>->getQuery(true)'
	    .'<br>->select(\'*\')'
	    .'<br>->from($db->quoteName(\'cliente\'));';
	echo '</code>';

	echo '<br><br><p>Consulta resultante:</p><code>';
	echo $dbMvc->replacePrefix((string) $query);
	echo '</code>';

	//resultado objectList
	$results = $dbMvc->loadObjectList();

	echo '<br><br><p>Resultado com $dbMvc->loadObjectList():</p>';
	echo '<ul>';
	foreach ($results as $row)
	{
		echo "<li> Id: " . $row->id . ", Cliente: &quot;" . $row->nome . "&quot;</li>";
	}
	echo '</ul>';

	echo '</blockquote>';
}