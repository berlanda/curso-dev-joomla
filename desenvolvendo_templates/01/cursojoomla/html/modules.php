<?php
defined('_JEXEC') or die;

function modChrome_exemploContainer($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) : ?>
		<div class="exemploContainer moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx', ''), ENT_COMPAT, 'UTF-8'); ?>">
		<?php if ($module->showtitle) : ?>
			<h<?php echo $headerLevel; ?>><?php echo $module->title; ?></h<?php echo $headerLevel; ?>>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}