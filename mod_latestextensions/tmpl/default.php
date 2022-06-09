<?php
	defined('_JEXEC') or die;
?>
<div class="latestextensions<?php echo $moduleclass_sfx ?>">
	<div class="row-striped">
		<?php foreach ($list as $item) : ?>
			<div class="row-fluid">
				<div class="span6">
					<strong class="row-title">
					<?php echo $item->name; ?>
					</strong>
				</div>
				<div class="span3 hidden-phone">
					<?php echo $item->type; ?>
				</div>
				<div cclass="span3 hidden-tablet hidden-phone">
					<?php echo $item->id; ?>
				</div>
			</div>
		<?php endforeach; ?>
 	</div>
</div>