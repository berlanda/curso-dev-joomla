<?php
defined('_JEXEC') or die;
$imagewidth=$this->params->get('imagewidth');
?>
<div class="item-page<?php echo $this->pageclass_sfx; ?>">
  <div class="mypreview">
    <?php foreach ($this->items as $item) : ?>
      <div class="mylivro_item">
        <div class="page-header">
          <h1> <?php echo $item->titulo; ?> </h1>
        </div>
        <div class="livro_element_img">
            <img src="<?php echo $item->imagem; ?>" width="<?php echo $imagewidth; ?>">
          </a>
        </div>
        <div class="livro_element_descricao">
          <?php echo $item->descricao; ?>
        </div>        
        <div class="livro_element_full">
          <strong>Autor:</strong> <?php echo $item->autor_nome; ?>
        </div>
        <div class="livro_element_full">
          <strong>Editora:</strong> <?php echo $item->editora; ?>
        </div>
        <div class="livro_element_full">
          <strong>Ano da publicação:</strong> <?php echo $item->ano_publicacao; ?>
        </div>
        <div class="livro_element_full">
          <strong>Categoria:</strong> <?php echo $item->category_title; ?>
        </div>
        <br /><br />
        <div class="livro_element_full">
          <a href="<?php echo $item->url; ?>" target="_blank" rel="nofollow">
           Saiba mais / Compre uma edição desse livro         
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>