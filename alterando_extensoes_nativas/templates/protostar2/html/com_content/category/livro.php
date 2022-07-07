<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

$document = JFactory::getDocument();
$cssFile = "./media/com_biblioteca/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);
?>
<div class="categories-list<?php echo $this->pageclass_sfx; ?>">
  <div class="page-header">
    <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
  </div>
  <div class="mypreview">

	<?php echo $afterDisplayTitle; ?>

	<?php
	$introcount = count($this->intro_items);
	$counter = 0;
	?>

	<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<?php
			$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));

			$jcfields = array();
			for ($i=1; $i < count($item->jcfields); $i++)
			{ 
				$jcfields[ $item->jcfields[$i]->name ] = $item->jcfields[$i]->rawvalue;
				if(is_array($jcfields[ $item->jcfields[$i]->name ]))
					$jcfields[ $item->jcfields[$i]->name ] = $item->jcfields[$i]->value;
			}
			?>

			<div class="mylivro">
				<div class="livro_element">
					<?php 
					$image = json_decode($item->images);
					 ?>
					<a href="<?php echo $link ?>">
						<img src="<?php echo $image->image_intro ?>" width="150" height="180" alt="imagem livro" />
					</a>
					<div class="livro_title">
						<a href="<?php echo $link ?>">
						  <?php echo $item->title; ?>
						</a>
					</div>
					<div class="livro_element">
						<strong><?php echo $jcfields['autor']; ?></strong>
					</div>
					<div class="livro_element">
						Editora: <?php echo $jcfields['editora']; ?>
					</div>
					<div class="livro_element">
					 	<strong><?php echo $jcfields['ano-da-publicacao']; ?></strong>
					</div>
				</div>
				<!-- end item -->
				<?php $counter++; ?>
			</div><!-- end span -->

		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> </div>
	<?php endif; ?>
   </div>
</div>
