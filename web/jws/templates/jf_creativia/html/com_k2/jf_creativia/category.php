<?php
/**
 * @version		$Id: category.php 1492 2012-02-22 17:40:09Z joomlaworks@gmail.com $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// define this is layout view
define ('_IS_LAYOUT_VIEW', true);

?>

<!-- Category titles -->
<style type="text/css">#wrapper-bg{	background : #f3f2ed url(<?php echo $this->baseurl ?>/templates/jf_creativia/images/k2-menu-container.gif) top left repeat-x;}div.padder{padding:0!important; background: none!important;}</style>
<section id="options" class="clearfix">
<div id="k2-menu-container">
<ul id="filters" class="option-set clearfix" data-option-key="filter">
        <li><a href="#filter" data-option-value="*" class="selected"><?php echo $this->category->name; ?></a></li>
		<?php if(isset($this->subCategories) && count($this->subCategories)): ?>
		<?php foreach($this->subCategories as $key=>$subCategory): ?>
			<li><a href="#filter" data-option-value=".<?php echo $subCategory->name; ?>"><?php echo $subCategory->name; ?></a></li>
		<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>
</section> <!-- #options -->

<div class="clr"></div>

<!-- Start K2 Category Layout -->
<div id="k2Container" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
		<!-- Page title -->
		<?php
			if(isset($this->category)) {
		?>
		<h2 class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h2>
		
	
		<?php }else{ ?>
		<h1 class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
	
		<?php } ?>
	<?php endif; ?>
	<?php if($this->params->get('catFeedIcon')): ?>
	<!-- RSS feed icon -->
	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
	<!-- Blocks for current category and subcategories -->
	<div class="elementListCategoriesBlock">

		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
		<!-- Category block -->
		<div class="elementListCategory">

			<?php if(isset($this->addLink)): ?>
			<!-- Item add link -->
			<span class="catItemAddLink">
				<a class="modal" rel="{handler:'iframe',size:{x:990,y:650}}" href="<?php echo $this->addLink; ?>">
					<?php echo JText::_('K2_ADD_A_NEW_ITEM_IN_THIS_CATEGORY'); ?>
				</a>
			</span>
			<?php endif; ?>

			<?php if($this->params->get('catImage') && $this->category->image): ?>
			<!-- Category image -->
			<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
			<?php endif; ?>

			<?php if($this->params->get('catTitle')): ?>
			<!-- Category title -->
			<h1 class="subcategory"><?php echo $this->category->name; ?><?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?></h1>
			<?php endif; ?>

			<?php if($this->params->get('catDescription')): ?>
			<!-- Category description -->
			<p><?php echo $this->category->description; ?></p>
			<?php endif; ?>

			<!-- K2 Plugins: K2CategoryDisplay -->
			<?php echo $this->category->event->K2CategoryDisplay; ?>

			<div class="clr"></div>
		</div>
		<?php endif; ?>

		<?php if($this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories)): ?>
		<!-- Subcategories -->
		<div class="elementListSubCategories">
			<h3><?php echo JText::_('K2_CHILDREN_CATEGORIES'); ?></h3>

			<?php foreach($this->subCategories as $key=>$subCategory): ?>

			<?php
			// Define a CSS class for the last container on each row
			if( (($key+1)%($this->params->get('subCatColumns'))==0) || count($this->subCategories)<$this->params->get('subCatColumns') )
				$lastContainer= ' subCategoryContainerLast';
			else
				$lastContainer='';
			?>

			<div class="subCategoryContainer<?php echo $lastContainer; ?>"<?php echo (count($this->subCategories)==1) ? '' : ' style="width:'.number_format(100/$this->params->get('subCatColumns'), 1).'%;"'; ?>>
				<div class="subCategory">
					<?php if($this->params->get('subCatImage') && $subCategory->image): ?>
					<!-- Subcategory image -->
					<a class="subCategoryImage" href="<?php echo $subCategory->link; ?>">
						<img alt="<?php echo K2HelperUtilities::cleanHtml($subCategory->name); ?>" src="<?php echo $subCategory->image; ?>" />
					</a>
					<?php endif; ?>

					<?php if($this->params->get('subCatTitle')): ?>
					<!-- Subcategory title -->
					<h2>
						<a href="<?php echo $subCategory->link; ?>">
							<?php echo $subCategory->name; ?><?php if($this->params->get('subCatTitleItemCounter')) echo ' ('.$subCategory->numOfItems.')'; ?>
						</a>
					</h2>
					<?php endif; ?>

					<?php if($this->params->get('subCatDescription')): ?>
					<!-- Subcategory description -->
					<p><?php echo $subCategory->description; ?></p>
					<?php endif; ?>

					<!-- Subcategory more... -->
					<div class="subCategoryFooter clearfix">
						<a class="subCategoryMore" href="<?php echo $subCategory->link; ?>">
							<?php echo JText::_('K2_VIEW_ITEMS'); ?>
						</a>
					</div>

					<div class="clr"></div>
				</div>
			</div>
			<?php if(($key+1)%($this->params->get('subCatColumns'))==0): ?>
			<div class="clr"></div>
			<?php endif; ?>
			<?php endforeach; ?>

			<div class="clr"></div>
		</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>



	<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary)) && (count($this->leading) || count($this->primary) || count($this->secondary))): ?>
	<!-- Item list -->
	<div class="elementList">
		<script type="text/javascript" src="templates/jf_creativia/lib/js/jquery.isotope.min.js"></script>

	 <script>
		jQuery(function(){
		  jQuery('#left').hide();
		  jQuery('.backToTop').hide();
		  jQuery('#cholder-l').attr('id', 'cholder');
		  jQuery('.cholder-inner').attr('class', 'cholder-inner2');
		  jQuery('.cholder-inner2').css('height', 'auto');
		  jQuery('.rotate').attr('class', 'rotate2');
		  var $container = jQuery('#container');

		  $container.isotope({
			itemSelector : '.element'
		  });
		  
		  
		  var $optionSets = jQuery('#options .option-set'),
			  $optionLinks = $optionSets.find('a');

		  $optionLinks.click(function(){
			var $this = jQuery(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
			  return false;
			}
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
	  
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
			  // changes in layout modes need extra logic
			  changeLayoutMode( $this, options )
			} else {
			  // otherwise, apply new options
			  $container.isotope( options );
			}
			
			return false;
		  });  
		});
	  </script>
		<div id="container">
		<?php 
			$years = array();
			if(isset($this->leading) && count($this->leading)){
				foreach($this->leading as $key => $item){
					$year = date('Y', strtotime($item->created));
					$years[$year] = isset($years[$year]) ? ($years[$year] + 1) : 1;
				}
			}
			
			if(isset($this->primary) && count($this->primary)){
				foreach($this->primary as $key=>$item){
					$year = date('Y', strtotime($item->created));
					$years[$year] = isset($years[$year]) ? ($years[$year] + 1) : 1;
				}
			}
			
			if(isset($this->secondary) && count($this->secondary)){
				foreach($this->secondary as $key=>$item){
					$year = date('Y', strtotime($item->created));
					$years[$year] = isset($years[$year]) ? ($years[$year] + 1) : 1;
				}
			}
			
			if(isset($this->links) && count($this->links)){
				foreach($this->links as $key=>$item){
					$year = date('Y', strtotime($item->created));
					$years[$year] = isset($years[$year]) ? ($years[$year] + 1) : 1;
				}
			}
			
			$this->yearCounts = $years;
		?>
		<?php if(isset($this->leading) && count($this->leading)): ?>
		<!-- Leading items -->
			<?php foreach($this->leading as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if(isset($this->primary) && count($this->primary)): ?>
		<!-- Primary items -->
			<?php foreach($this->primary as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if(isset($this->secondary) && count($this->secondary)): ?>
		<!-- Secondary items -->
		
			<?php foreach($this->secondary as $key=>$item): ?>			
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
		
		<?php if(isset($this->links) && count($this->links)): ?>
		<!-- links items -->
		
			<?php foreach($this->links as $key=>$item): ?>			
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>

		</div>

	</div>
	
	<!-- Pagination -->
	<?php
			// Build the additional URL parameters string.
			$urlparams = '';
			if (!empty($this->pagination->_additionalUrlParams))
			{
				foreach ($this->pagination->_additionalUrlParams as $key => $value)
				{
					$urlparams .= '&' . $key . '=' . $value;
				}
			}
			$next = $this->pagination->get('pages.current') * $this->pagination->limit;
			$nextlink = JRoute::_($urlparams . '&' . $this->pagination->prefix . 'limitstart=' . $next);
	?>
	<div id="page-nav">
	<a id="page-next-link" href="<?php echo $nextlink ?>"></a>
	</div>

	<?php endif; ?>
</div>
<!-- End K2 Category Layout -->
