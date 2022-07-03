<?php defined('_JEXEC') or die;
//DEFINIÇÕES DE VARIÁVEIS , INCLUDES E OUTROS CÓDIGOS PHP

$app = JFactory::getApplication();
$user = JFactory::getUser();
$menu = $app->getMenu();
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

// Variáveis ativas que facilitarão personalização dos layouts das páginas
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$isHomePage = ($menu->getActive() == $menu->getDefault())? 1 : 0;

// Definindo saída dos códigos como HTML5. Útil para extensões que façam essa verificação.
$this->setHtml5(true);

// Obtendo os parâmetros do template que forem configurados no templateDetails.xml
$params = $app->getTemplate(true)->params;
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
	<head>
			<jdoc:include type="head" />
	</head>
	<body class="site <?php echo $option
		. ' view-' . $view
		. ($layout ? ' layout-' . $layout : ' no-layout')
		. ($task ? ' task-' . $task : ' no-task')
		. ($itemid ? ' itemid-' . $itemid : '');
	?>">
		<header class="header">
			<h1>
				<a href="<?php echo $this->baseurl; ?>/" title="Página inicial">
					<?php echo $sitename; ?>
				</a>
			</h1>
		</header>
		<p>...</p>
		<jdoc:include type="modules" name="topo" style="exemploContainer" headerlevel="2" />
		<p>...</p>
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		<p>...</p>
		<jdoc:include type="modules" name="debug" style="none" />
	</body>
</html>