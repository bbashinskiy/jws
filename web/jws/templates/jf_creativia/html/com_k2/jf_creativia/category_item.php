<?php
/**
 * @version		$Id: category_item.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

// get extra class from extra field of item
$xclass_key = 'Extended Classes';
$xclass = '';
if(count($this->item->extra_fields)) {
	$extra_fields=K2ModelItem::getItemExtraFields($this->item->extra_fields);
	if (count($extra_fields)) {
		foreach ($extra_fields as $key=>$extraField) {
			if ($extraField->name == $xclass_key) {
				$xclass = $extraField->value;
				break;
			}
		}
	}
}

// build intro images
// if intro images exists in $images, use it
// if not, get images from intro content
// if not, get from full image in $images
if (empty($this->item->image)) {
	$regex = '#(<img[^>]*>)#i';
	if (preg_match ($regex, $this->item->introtext, $match)) {
		$image = $match[1];
		// get img src
		$regex = '#\s+src\s*=\s*(["\'])([^\'"]+)\1[\s\/>]#i';
		if (preg_match ($regex, $image, $match)) {
			$this->item->image = $match[2];
		}
		// get img caption
		$this->item->image_caption = '';
		$regex = '#\salt\s*=\s*(["\'])([^\'"]+)\1[\s\/>]#i';
		if (preg_match ($regex, $image, $match)) {
			$this->item->image_caption = $match[2];
		}
	}	
}
// build intro content
// get the first paragraph in introtext, trip tags (keep a, strong, br, b...)
$introtext = '';
// get first paragraph
$regex = '#<p[^>]*>(.*)</p>#i';
if (preg_match ($regex, $this->item->introtext, $match)) {
	$introtext = $match[1];
} else {
	$introtext = $this->item->introtext;
}
// trip tag
$introtext = '<p style="margin-left: 15px; text-align: center;">'.strip_tags ($introtext, '<a><b><strong><br>').'</p>';
?>

<!-- Start K2 Item Layout -->
<div class="element <?php echo $this->item->category->name; ?> <?php echo $xclass ?>"  data-category="<?php echo $this->item->category->name; ?>">

  	<!-- Featured flag -->
	<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
		<div class="featured">&nbsp;</div>
	<?php endif; ?>
	<!-- //Feature flag -->

	<div class="inner item-inner">
		<!-- Plugins: BeforeDisplay -->
		<?php echo $this->item->event->BeforeDisplay; ?>

		<!-- K2 Plugins: K2BeforeDisplay -->
		<?php echo $this->item->event->K2BeforeDisplay; ?>
		
		<?php if($this->item->params->get('catItemImage')): ?>
		<!-- Item Image-->
		<div class="element-image">
		    <a class="item-link" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="<?php if(!empty($this->item->image)) echo $this->item->image; else echo JURI::root() . 'templates/jf_creativia/images/k2-without-image.jpg'; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" />
		    </a>
		</div>
		<!-- //Item Image-->
		<?php endif; ?>
		
		<!-- Item main -->
		<div class="element-main">

			<!-- Item header -->
			<div class="catItemHeader">
				<?php if($this->item->params->get('catItemTitle')): ?>
				<h3 class="catItemTitle">
				<?php if(isset($this->item->editLink)): ?>
				<!-- Item edit link -->
				<span class="catItemEditLink">
					<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
						<?php echo JText::_('K2_EDIT_ITEM'); ?>
					</a>
				</span>
				<?php endif; ?>
					<?php if ($this->item->params->get('catItemTitleLinked')): ?>
						<a class="element-link" href="<?php echo $this->item->link; ?>">
						<?php echo $this->item->title; ?>
						</a>
					<?php else: ?>
						<?php echo $this->item->title; ?>
					<?php endif; ?>
					
				</h3>
				<?php endif; ?>
				
				<?php if($this->item->params->get('catItemCategory') || $this->item->params->get('catItemDateCreated') || $this->item->params->get('catItemAuthor')): ?>
				<dl class="article-info">
					<?php if($this->item->params->get('catItemCategory')): ?>
					<!-- Item category name -->
					<dd class="category-name">
					<?php echo JText::_('K2_PUBLISHED_IN'); ?>:
					<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
					</dd>
					<?php endif; ?>

					<?php if($this->item->params->get('catItemDateCreated')): ?>
					<!-- Date created -->
					<dd class="create">
						<strong><?php echo JText::_('K2_CREATED_DATE'); ?>: </strong>
						<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
					</dd>
					<?php endif; ?>

					<?php if($this->item->params->get('catItemAuthor')): ?>
					<!-- Item Author -->
					<dd class="createdby">
						<strong><?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?>: </strong> <a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
					</dd>
					<?php endif; ?>
				</dl>
				<?php endif; ?>
				
			</div>
			<!-- //Item header -->
			
			<!-- Plugins: AfterDisplayTitle -->
			<?php echo $this->item->event->AfterDisplayTitle; ?>

			<!-- K2 Plugins: K2AfterDisplayTitle -->
			<?php echo $this->item->event->K2AfterDisplayTitle; ?>
			
			<?php if($this->item->params->get('catItemIntroText')): ?>
			<!-- Item content -->
			<div class="content item-content">
				<!-- Plugins: BeforeDisplayContent -->
				<?php echo $this->item->event->BeforeDisplayContent; ?>

				<!-- K2 Plugins: K2BeforeDisplayContent -->
				<?php echo $this->item->event->K2BeforeDisplayContent; ?>
				
				<?php if($this->item->params->get('catItemIntroText')): ?>
					<?php echo $introtext; ?>
				<?php endif; ?>
				
				<!-- Plugins: AfterDisplayContent -->
				<?php echo $this->item->event->AfterDisplayContent; ?>

				<!-- K2 Plugins: K2AfterDisplayContent -->
				<?php echo $this->item->event->K2AfterDisplayContent; ?>
				
			</div>
			<!-- //Item content -->
			<?php endif; ?>
			
			<?php if(
			  $this->item->params->get('catItemTags') ||
			  $this->item->params->get('catItemAttachments')
			): ?>
			<!-- Item links -->
			<div class="element-links clearfix">
			
				<?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
				<!-- Item tags -->
				<div class="element-tags">
					<strong><?php echo JText::_('K2_TAGGED_UNDER'); ?>:&nbsp;</strong>
					<ul class="catItemTags">
						<?php foreach ($this->item->tags as $tag): ?>
						<li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>,</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>				
			
			</div>
			<!-- //Item links -->
			<?php endif; ?>
			<!-- Item footer -->
			<div class="footer element-footer clearfix">
			
		
				
				<?php if($this->item->params->get('catItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
				<!-- Anchor link to comments below -->
				<div class="comments-link">
					<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
						<!-- K2 Plugins: K2CommentsCounter -->
						<?php echo $this->item->event->K2CommentsCounter; ?>
					<?php else: ?>
						<?php if($this->item->numOfComments > 0): ?>
						<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
							<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
						</a>
						<?php else: ?>
						<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
							<strong>0</strong> <?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
						</a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				
				
				<?php if ($this->item->params->get('catItemReadMore')): ?>
				<p class="readmore">
					<a class="item-link" href="<?php echo $this->item->link; ?>">
						<?php echo JText::_('K2_READ_MORE'); ?>
					</a>
				</p>
				<?php endif; ?>
				
			</div>
			<!-- //Item footer -->
		</div>
		<!-- //Item main -->
		
	<!-- Plugins: AfterDisplay -->
	<?php echo $this->item->event->AfterDisplay; ?>

	<!-- K2 Plugins: K2AfterDisplay -->
	<?php echo $this->item->event->K2AfterDisplay; ?>

	</div>
</div>
<!-- End K2 Item Layout -->
