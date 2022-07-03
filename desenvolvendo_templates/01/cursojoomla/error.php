<?php defined('_JEXEC') or die;
	$app = JFactory::getApplication();
	$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>	
	</head>
	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
		<link href="<?php echo JUri::root(true); ?>/media/cms/css/debug.css" rel="stylesheet" />
	<?php endif; ?>
	<body>
		<p>...</p>
		<?php
			$module = JModuleHelper::getModule('topo');
			$params = array('style' => 'exemploContainer');
		 	echo JModuleHelper::renderModule($module, $params);
		?>	
		<p>...</p>
		<h2>
			<?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?>
		</h2>
		<h3><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h3>
		<div>
			<p>
			<a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
			</p>
		</div>
		<h2>
			#<?php echo $this->error->getCode(); ?>&nbsp;<?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
		</h2>
		<?php if ($this->debug) : ?>
			<br/><?php echo htmlspecialchars($this->error->getFile(), ENT_QUOTES, 'UTF-8');?>:<?php echo $this->error->getLine(); ?>
		<?php endif; ?>
	</body>
</html>