<?php
defined('_JEXEC') or die;

$width=$this->params->get('targetwidth');
$height=$this->params->get('targetheight');
$imagewidth=$this->params->get('imagewidth');

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
            $item->url_component = JRoute::_('index.php?option=com_biblioteca&view=livro&tmpl=component&id='.(int)$item->id);

            $item->url_interna = JRoute::_('index.php?option=com_biblioteca&view=livro&id='.(int)$item->id);

            switch ($this->params->get('target'))
            {
              case 1:
                echo '<a href="'. $item->url_interna .'" target="_blank" rel="nofollow">'.'<img src="'. $item->imagem .'" width="'.$imagewidth.'"></a>';
              break;
              case 2:
                $attribs = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width='.$this->escape($width).',height='.$this->escape($height).'';
                echo "<a href=\"$item->url_component\" onclick=\"window.open(this.href, 'targetWindow', '"
                      .$attribs."'); return false;\">".
                      '<img src="'. $item->imagem .'" width="'.$imagewidth.'"></a>';
              break;
              case 3:
                JHtml::_('behavior.modal', 'a.modal'); ?>
                 <a class="modal" href="<?php echo $item->url_component;?>"
                 rel="{handler: 'iframe', size: {x:<?php echo $this->escape($width);?>,
                  y:<?php echo $this->escape($height);?>}}">
                    <img src="<?php echo $item->imagem; ?>" width="<?php echo $imagewidth; ?>"></a>
                  <?php
              break;
              default:
                echo '<a href="'.  $item->url_interna . '" rel="nofollow">'.
                   '<img src="'. $item->imagem .'" width="'.$imagewidth.'"></a>';
              break;
            }
            ?>
          </div>
          <div class="livro_title">
            <a href="<?php echo $item->url_interna; ?>">
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