<?php
defined('_JEXEC') or die;
?>
<form action="<?php echo JRoute::_('index.php?option=com_biblioteca&view=livros'); ?>" method="post" name="adminForm" id="adminForm">
	<?php if (!empty( $this->sidebar)) : ?>
     <div id="j-sidebar-container" class="span2">
       <?php echo $this->sidebar; ?>
	 </div>
     <div id="j-main-container" class="span10">
   	<?php else : ?>
     <div id="j-main-container">
   	<?php endif;?>
   		
		<table class="table table-striped" id="livroList">
			
			<tbody>

				<tr class="row0" sortable-group-id="1">
					<td class="order nowrap center hidden-phone">
					<strong>Parabéns!</strong>
            		</td>
				</tr>
				<tr class="row1" sortable-group-id="1">
					<td class="order nowrap center hidden-phone">
						<p>você está trabalhando na view do seu primeiro componente.</p>
            		</td>
				</tr>
				<tr class="row0" sortable-group-id="1">
					<td class="order nowrap center hidden-phone">
					 Tela de backend.
            		</td>
				</tr>				
			</tbody>
		</table>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>