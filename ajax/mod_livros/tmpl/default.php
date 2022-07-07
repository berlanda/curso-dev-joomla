<?php
	defined('_JEXEC') or die;
?>
<div class="livros_container_ajax livros_ajax<?php echo $moduleclass_sfx ?>" style="border:1px solid #e3e3e3; border-radius: 4px; background: #f5f5f5">
 	<div class="row-striped">
 	</div>
 	<button id="btnCarregarLivros" style="float:right; margin-top:5px; border:1px solid #e3e3e3; border-radius: 4px; background: #f5f5f5">Carregar</button>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		
		jQuery('#btnCarregarLivros').click(function(){
			jQuery('.livros_container_ajax .row-striped').hide();
			jQuery('.livros_container_ajax .row-striped').html('Carregando...');
			
			jQuery.ajax('<?php echo JURI::base(); ?>index.php?option=com_ajax&module=livros&group=search&format=json',   // request url
			    {
			        success: function (data, status, xhr) {// success callback function
			        	
			        	output = '';
			        	data = data.data;
			        	for (var i = 0; i < data.length; i++)
			        	{
			        		link = '<a href="<?php echo JURI::base(); ?>index.php?option=com_biblioteca&view=livro&id='+data[i].id+'" style="color:#666">'+data[i].titulo+'</a>';		        			
			        		output += '<div class="row-fluid">'+link+'</div>';
			        	}			
			        	jQuery('.livros_container_ajax .row-striped').html(output); 			            
			            jQuery('.livros_container_ajax .row-striped').show('slow'); 
			    }
			});

		});

	});
</script>