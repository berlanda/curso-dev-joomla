<?php
defined('_JEXEC') or die;
JHtml::_('behavior.formvalidator');
?>
<form action="<?php echo JRoute::_('index.php?option=com_biblioteca&view=sugerirlivro'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
   <div class="page-header">
      <h1><?php echo JText::_('COM_BIBLIOTECA_SUGERIR_LIVRO') ?></h1>
   </div>
   <div class="row-fluid">
      <div class="span10 form-horizontal">
         <fieldset>
            <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>
            <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->id) ? JText::_('COM_BIBLIOTECA_NEW_LIVRO', true) : JText::sprintf('COM_BIBLIOTECA_EDIT_LIVRO', $this->item->id, true)); ?>

            <div class="control-group">
               <div class="control-label"><?php echo $this->form->getLabel('titulo'); ?></div>
               <div class="controls"><?php echo $this->form->getInput('titulo'); ?></div>
            </div>

              <div class="control-group">
               <div class="control-label"><?php echo $this->form->getLabel('editora'); ?></div>
               <div class="controls"><?php echo $this->form->getInput('editora'); ?></div>
              </div>
              <div class="control-group">
               <div class="control-label"><?php echo $this->form->getLabel('ano_publicacao'); ?></div>
               <div class="controls"><?php echo $this->form->getInput('ano_publicacao'); ?></div>
              </div>
              <div class="control-group">
               <div class="control-label"><?php echo $this->form->getLabel('url'); ?></div>
               <div class="controls"><?php echo $this->form->getInput('url'); ?></div>
              </div>
              <div class="control-group">
               <div class="control-label"><?php echo $this->form->getLabel('descricao'); ?></div>
               <div class="controls">
                  <textarea name="jform[descricao]" id="jform_descricao" class="inputbox required"></textarea>
               </div>
              <?php if( ! empty( $this->form->getInput('captcha') ) ): ?>
              <div class="control-group">
               <div class="control-label"><?php echo $this->form->getLabel('captcha'); ?></div>
               <div class="controls">
                  <?php echo $this->form->getInput('captcha'); ?>
               </div>
              </div>
            <?php endif; ?>
            <?php
            $return = 'index.php?option=com_biblioteca&view=sugerirlivro&layout=sucesso&Itemid=' . $this->Itemid;
            $return = base64_encode($return);
            ?>

            <?php echo JHtml::_('bootstrap.endPanel'); ?>
            <input type="hidden" name="return" value="<?php echo $return; ?>" />
            <input type="hidden" name="published" value="0" />
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
            <?php echo JHtml::_('bootstrap.endPane'); ?>
         </fieldset>
      </div>
   </div>
   <div class="btn-toolbar pull-right">
      <div class="btn-group">
         <button type="button" class="btn" onclick="Joomla.submitbutton('sugerirlivro.cancel')">
            <i class="icon-cancel"></i> <?php echo JText::_('JCANCEL') ?>
         </button>
      </div>
      <div class="btn-group">
         <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('sugerirlivro.save')">
            <i class="icon-new"></i> <?php echo JText::_('COM_BIBLIOTECA_BUTTON_SAVE_AND_CLOSE') ?>
         </button>
      </div>
   </div>
</form>