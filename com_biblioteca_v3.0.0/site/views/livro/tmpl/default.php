<?php
defined('_JEXEC') or die;
?>
<div class="item-page<?php echo $this->pageclass_sfx; ?>">
  <div class="mypreview">
    <?php foreach ($this->items as $item) : ?>
      <div class="mylivro_item">
        <div class="page-header">
          <h1> <?php echo $item->titulo; ?> </h1>
        </div>
        <div class="livro_element_img">
            <img src="<?php echo $item->imagem; ?>">
          </a>
        </div>
        <div class="livro_element_descricao">
          <?php echo $item->descricao; ?>
        </div>        
        <div class="livro_element_full">
          <strong><?php echo JText::_('COM_BIBLIOTECA_AUTOR');?></strong><?php echo $item->autor_nome; ?>
        </div>
        <div class="livro_element_full">
          <strong><?php echo JText::_('COM_BIBLIOTECA_EDITORA');?></strong><?php echo $item->editora; ?>
        </div>
        <div class="livro_element_full">
          <strong><?php echo JText::_('COM_BIBLIOTECA_ANO_PUBLICACAO');?></strong><?php echo $item->ano_publicacao; ?>
        </div>
        <div class="livro_element_full">
          <strong><?php echo JText::_('COM_BIBLIOTECA_CATEGORY');?></strong><?php echo $item->category_title; ?>
        </div>
        <br /><br />
        <div class="livro_element_full">
          <a href="<?php echo $item->url; ?>" target="_blank" rel="nofollow">
            <?php echo JText::_('COM_BIBLIOTECA_URL_DESCRIPTION');?>            
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>