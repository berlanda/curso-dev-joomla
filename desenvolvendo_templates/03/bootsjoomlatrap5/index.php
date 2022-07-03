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
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<jdoc:include type="head" />
		<?php if($isHomePage): ?>
			<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">

			<link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

			<!-- Favicons -->
			<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
			<link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
			<link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
			<link rel="manifest" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/manifest.json">
			<link rel="mask-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
			<link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">
			<meta name="theme-color" content="#712cf9">

			<!-- Custom styles for this template -->
			<link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
			<link href="<?php echo $this->baseurl; ?>/templates/bootsjoomlatrap5/css/template_home.css" rel="stylesheet">
		<?php else: ?>
			<link rel="canonical" href="https://getbootstrap.comhttps://getbootstrap.com/docs/5.2/examples/cheatsheet/">
			<link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

			    <!-- Favicons -->
			<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
			<link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
			<link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
			<link rel="manifest" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/manifest.json">
			<link rel="mask-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
			<link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">
			<meta name="theme-color" content="#712cf9">
			<link href="<?php echo $this->baseurl; ?>/templates/bootsjoomlatrap5/css/template_internas.css" rel="stylesheet">			
		<?php endif; ?>
	</head>
	<body class="site <?php echo $option
		. ' view-' . $view
		. ($layout ? ' layout-' . $layout : ' no-layout')
		. ($task ? ' task-' . $task : ' no-task')
		. ($itemid ? ' itemid-' . $itemid : '')
		. ($isHomePage ? '' : ' bg-light');
	?>">
		<?php
			if ($isHomePage)
			{
				include __DIR__ . '/_home.php';
			}
			else
			{
				include __DIR__ . '/_internas.php';
			}
		?>
	</body>
</html>