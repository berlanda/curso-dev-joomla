<?php
defined('_JEXEC') or die;

$imagewidth=200;
?>
<div class="categories-list<?php echo $this->pageclass_sfx; ?>">
  <div class="page-header">
    <h1> <?php echo $this->escape($this->params->get('page_title')); ?> </h1>
  </div>
  <div class="mypreview">
    <?php foreach ($this->items as $item) : ?>
       <div class="mylivro">
          <div class="livro_element">
            <?php            
                echo '<a href="'.  $item->url . '" rel="nofollow">'.
                   '<img src="'. $item->imagem .'" width="'.$imagewidth.'"></a>';
            ?>
          </div>
          <div class="livro_title">
            <a href="<?php echo $item->url; ?>">
              <?php echo $item->titulo; ?>
            </a>
          </div>
          <div class="livro_element">
            <strong><?php echo $item->autor_nome; ?></strong>
          </div>
          <div class="livro_element">
             Editora: <?php echo $item->editora; ?>
          </div>
          <div class="livro_element">
             <strong><?php echo $item->ano_publicacao; ?></strong>
          </div>
       </div>
    <?php endforeach; ?>
  </div>
</div>