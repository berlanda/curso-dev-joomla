<?php
defined('_JEXEC') or die;
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
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
			<thead>
				<tr>	
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value=""
						title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>"
						onclick="Joomla.checkAll(this)" />
					</th>
					<th width="1%" style="min-width:55px" class="nowrap center">
		               <?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state',
		               $listDirn, $listOrder); ?>
             		</th>					
					<th class="title">
						<?php echo JHtml::_('grid.sort', 'Título',
						'a.titulo', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone">
			            <?php echo JHtml::_('grid.sort', 'Autor',
			            'd.nome', $listDirn, $listOrder); ?>
			        </th>
					<th class="nowrap hidden-phone">
			            <?php echo JHtml::_('grid.sort', 'Editora',
			            'a.editora', $listDirn, $listOrder); ?>
			        </th>
			        <th width="1%" class="nowrap center hidden-phone">
			            <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID',
			            'a.id', $listDirn, $listOrder); ?>
			        </th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($this->items as $i => $item) :

				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="center">
            			<?php echo JHtml::_('jgrid.published', $item->state, $i,
            			'livros.', 1, 'cb', $item->publish_up, $item->publish_down); ?>
          			</td>
					<td class="nowrap has-context">
           				<?php echo $this->escape($item->titulo); ?>				
					</td>					
            		<td class="center hidden-phone">
			        	<?php echo $this->escape($item->autor_nome); ?>
            		</td>
					<td class="hidden-phone">
			            <?php echo $this->escape($item->editora); ?>
			        </td>
			        <td class="center hidden-phone">
			        	<?php echo (int) $item->id; ?>
            		</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>