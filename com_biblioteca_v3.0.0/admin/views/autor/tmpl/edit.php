<?php
defined('_JEXEC') or die;
?>
<form action="<?php echo JRoute::_('index.php?option=com_biblioteca&view=autor&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset>
				<?php echo JHtml::_('bootstrap.startPane', 'myTab',
				array('active' => 'details')); ?>
				<?php echo JHtml::_('bootstrap.addPanel', 'myTab',
					'details', empty($this->item->id) ?
					JText::_('COM_BIBLIOTECA_NEW_AUTOR', true) :
					JText::sprintf('COM_BIBLIOTECA_EDIT_AUTOR',
					$this->item->id, true));
				?>
				<?php
				/*
				?>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('nome'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('nome'); ?></div>
				</div>
				<?php
				//*
				?>				
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('published'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('published'); ?></div>
		        </div>
		        <div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('imagem'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('imagem'); ?></div>
		        </div>
		        <div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('url'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('url'); ?></div>
		        </div>
		        <div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('descricao'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('descricao'); ?></div>
				</div>
				<?php
				//*/
				//*
				?>
				<?php foreach ($this->form->getFieldset('myfields') as $field): ?>
				  <div class="control-group">
				    <div class="control-label">
				     	<?php echo $field->label; ?>
				    </div>
				    <div class="controls">
						<?php echo $field->input; ?>
               		</div>
            	 </div>
           		<?php endforeach; ?>	
				<?php
				//*/
				?>				
				<?php echo JHtml::_('bootstrap.endPanel'); ?>
				<input type="hidden" name="task" value="" />
				<?php echo JHtml::_('form.token'); ?>
				<?php echo JHtml::_('bootstrap.endPane'); ?>
			</fieldset>
		</div>
	</div>
</form>