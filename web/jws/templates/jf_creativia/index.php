<?php
/*------------------------------------------------------------------------
# JF CREATIVIA - JOOMFREAK.COM JOOMLA 2.5.0 TEMPLATE 01-2014
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2013 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE:  http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL:  info@joomfreak.com
-------------------------------------------------------------------------*/
$revisit = false;
if(isset($_COOKIE['FirstVisitOfDay'])) {
	$revisit = true;
} else {
	setcookie("FirstVisitOfDay","1",time() + 3600);
	$revisit = false;
}

// no direct access
defined('_JEXEC') or die('Restricted access');
include_once (JPATH_ROOT.DS.'templates/jf_creativia/lib/php/req.php');

// Check modules
$showLeft = $this->countModules('left');

$app  = JFactory::getApplication();
$doc  = JFactory::getDocument();
$menu = $app->getMenu();

$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/system/css/general.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/menu.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/media_queries.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/style.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/k2.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/responsive.css', $type = 'text/css');

?>
<?php $view = $_REQUEST['view']; ?>
<?php $option = $_REQUEST['option']; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1" />
<jdoc:include type="head" />

<!--[if lt IE 9]><style type="text/css">.gradient{filter: none;}</style>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function(){
	var backWidth = jQuery('#left').width();
	jQuery('.backToTop').css('width', backWidth);
	if((jQuery('#cholder-l').height()-jQuery('#left').height())<90) {
		jQuery('.backToTop').css('position', 'static');
	}
	
	jQuery('.backToTop a').click(function(event){
		event.preventDefault();
		jQuery('body,html').animate({scrollTop:0},500);
	});
	
	jQuery('.pagination-next .pagenav').html('&raquo;');
	jQuery('.pagination-prev .pagenav').html('&laquo;');
	
	jQuery('#navcollapse').click(function(){
		jQuery('.main_menu').slideToggle("slow");;
	});
	
	// Text Resizer
	jQuery('#fontDecrease').click(function(event){
		event.preventDefault();
		jQuery('.itemIntroText').removeClass('largerFontSize');
		jQuery('.itemIntroText').addClass('smallerFontSize');
	});
	jQuery('#fontIncrease').click(function(event){
		event.preventDefault();
		jQuery('.itemIntroText').removeClass('smallerFontSize');
		jQuery('.itemIntroText').addClass('largerFontSize');
	});

	if(jQuery(window).width()>750){
		var itemLatest = jQuery('.itemLatest .catItemTitle').html();
		jQuery('.itemLatest .catItemTitle').hide();
		jQuery('.rotate h1').html(itemLatest);
		
		var tagLatest = jQuery('.itemLatest .tagItemTitle').html();
		jQuery('.itemLatest .tagItemTitle').hide();
		jQuery('.rotate h1').html(tagLatest);
		
		var userLatest = jQuery('.itemLatest .userItemTitle').html();
		jQuery('.itemLatest .userItemTitle').hide();
		jQuery('.rotate h1').html(userLatest);
		
		var blogLatest = jQuery('.row-0 .contentheading').html();
		jQuery('.row-0 .contentheading').hide();
		jQuery('.rotate h1').html(blogLatest);
		
		var itemHeader = jQuery('.item-header h1').html();
		jQuery('.item-header h1').hide();
		jQuery('.rotate h1').html(itemHeader);
		
		var itemTitle = jQuery('.itemTitle').html();
		jQuery('.itemTitle').hide();
		jQuery('.rotate h1').html(itemTitle);
		
		var contactHeader = jQuery('.contact h1').html();
		jQuery('.contact h1').hide();
		jQuery('.rotate h1').html(contactHeader);
		
		//rotate
		<?php if($option != 'com_contact') : ?>
		if(jQuery('.cholder-inner').height() < jQuery('.rotate').width()) {
			jQuery('.cholder-inner').height(jQuery('.rotate').width()+220);
		}
		<?php endif; ?>
		var bottom = jQuery('.rotate').width()/2;	
		var left = bottom-(jQuery('#left').width()+40)/2;
		jQuery('.rotate').css('top', 120+bottom);
		jQuery('.rotate h1').css('left', -left);
		jQuery('.backToCategory').css('top', 120+bottom);
		jQuery('.backToCategory p').css('left', -(left+200));
		
		jQuery( window ).resize(function() {
			var bottom = jQuery('.rotate').width()/2;	
			var left = bottom-(jQuery('#left').width()+40)/2;
			jQuery('.rotate').css('top', 120+bottom);
			jQuery('.rotate h1').css('left', -left);
			jQuery('.backToCategory').css('top', 120+bottom);
			jQuery('.backToCategory p').css('left', -(left+200));
		});
	}
});
</script>

<?php 
if ($startingpage == 'yes' && $revisit == false) {
	include(JPATH_ROOT.DS.'templates/jf_creativia/lib/php/spage.php');
}
?>
</head>
<body>
<div class="container">
	<div id="top">
       	<div class="inner">
		  	<div id="jf_logo">
				<a title="<?php echo htmlspecialchars($app->getCfg("sitename")); ?>" href="index.php"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo-jws.png"  alt="logo-jws" /></a>
			</div>                

			<div class="main_menu_box">
				<div>
					<?php if($this->countModules('menu')) : ?>
					<div id="navbutton">
						<a id="navcollapse">Menu</a>
					</div>
					<div class="main_menu">
						<jdoc:include type="modules" name="menu" style="xhtml" />
					</div>	
					<?php endif; ?>
						
					<?php if ($this->countModules( 'search' )) : ?>
					<div id="search">
						<jdoc:include type="modules" name="search" style="xhtml" />
					</div>	
					<?php endif; ?>														
					<div class="clr"></div>
				</div>	
			</div>
			<div class="clr"></div>
		</div>
	</div>
	
	<?php if ($this->countModules( 'submenu' )) : ?>
	<div id="submenu">
		<div class="wrapper clearfix">
			<jdoc:include type="modules" name="submenu" />
		</div>
	</div>
	<?php endif; ?>

	<?php if($this->countModules('slideshow')) : ?>
	<div id="slideshow">
		<jdoc:include type="modules" name="slideshow" style="none" />
	</div>	
	<?php endif; ?>

	<?php if ($fpage == 'no') { ?>		
	<div id="wrapper-bg">
		<div id="wrapper<?php if($option == 'com_k2'):?>-k2<?php endif; ?><?php if ($option == 'com_content' || $option == 'com_contact') : ?>-ct<?php endif; ?>" >
			<div class="clr"></div>
		</div>
	</div>

	<?php } else if ($fpage == 'yes') {

	if ($menu->getActive() == $menu->getDefault()) {}
	else { ?>

		<div id="wrapper-bg">
			<div id="wrapper<?php if($option == 'com_k2'):?>-k2<?php endif; ?><?php if ($option == 'com_content' || $option == 'com_contact') : ?>-ct<?php endif; ?>" >
				<div class="padder">

					<div id="left">
						<div class="rotate">
							<h1></h1>
						</div>						
					</div>	
					
					<div id="cholder-l">
						<div class="cholder-inner">
						<jdoc:include type="message" />
						<jdoc:include type="component" />

						<?php if ($this->countModules('c-bottom1') or $this->countModules('c-bottom2') or $this->countModules('c-bottom3' )) : ?>
						<?php
						$spotlight = array ('c-bottom1','c-bottom2','c-bottom3');
						$cbotsl = $tmpTools->calSpotlight ($spotlight,99,33);
							if( $cbotsl ) :
							?>
		
							<div id="c-bottom">	
								<?php if($this->countModules('c-bottom1')) : ?>
								<div class="c-bottom1" style="width:<?php echo $cbotsl['c-bottom1']['width']; ?>"> 
									<jdoc:include type="modules" name="c-bottom1" style="xhtml" />
								<?php endif; ?>
								</div>
			
								<?php if($this->countModules('c-bottom2')) : ?>
								<div class="c-bottom2" style="width:<?php echo $cbotsl['c-bottom2']['width']; ?>"> 
									<jdoc:include type="modules" name="c-bottom2" style="xhtml" />
								<?php endif; ?>
								</div>
		
								<?php if($this->countModules('c-bottom3')) : ?>
								<div class="c-bottom3" style="width:<?php echo $cbotsl['c-bottom3']['width']; ?>"> 
									<jdoc:include type="modules" name="c-bottom3" style="xhtml" />
								<?php endif; ?>
								</div>
							</div>

							<?php endif; ?>
						<?php endif; ?>
							
						<div class="clr"></div>
						</div>
					</div>
					<?php if ($option != 'com_users') : ?>
					<div class="backToTop">
						<a href="#">go to top</a>
					</div>
					<?php endif; ?>
					<div class="clr"></div>
				</div>				
			</div>
		</div>
		<?php } ?>
	<?php } ?>	

	<div id="bot">
        <div class="inner">
			<?php if ($this->countModules('breadcrumb')) : ?>
			<div id="breadcrumb">
				<jdoc:include type="modules" name="breadcrumb" style="xhtml" />
			</div>	
			<?php endif; ?>

			<?php if ($this->countModules( 'user4 or user5 or user6' )) : ?>
				<?php
				$spotlight = array ('user4','user5','user6');
				$botsl = $tmpTools->calSpotlight ($spotlight,100,40);
				if( $botsl ) :
				?>			
					<?php if(
					$this->countModules('user4') || 
					$this->countModules('user5') || 
					$this->countModules('user6') || 
					($this->params->get('facebook') != '') ||
					($this->params->get('linkedin') != '') ||
					($this->params->get('skype') != '') ||
					($this->params->get('twitter') != '') ||
					($this->params->get('youtube') != '') ||
					($this->params->get('rss') != '') ) : ?>
					<aside class="users_bottom">
																	
					<?php if($this->countModules('user4')) : ?>
					<div class="user4 user" style="width:<?php echo $botsl['user4']['width']; ?>"> 
						<jdoc:include type="modules" name="user4" style="xhtml" />
					<?php endif; ?>


					<div id="social-links">
						<ul>
						<?php if ($this->params->get('facebook') != '') : ?>
							<li><a target="_blank" id="facebook" title="Visit us on Facebook" href="<?php echo $this->params->get('facebook') ?>">
								<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/social-icons/facebook.png" alt="" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ($this->params->get('linkedin') != '') : ?>
							<li><a target="_blank" id="linkedin" title="Visit us on Linkedin" href="<?php echo $this->params->get('linkedin') ?>">
								<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/social-icons/linkedin.png" alt="" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ($this->params->get('skype') != '') : ?>
							<li><a id="skype" title="Call us via Skype" href="<?php echo $this->params->get('skype') ?>">
								<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/social-icons/skype.png" alt="" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ($this->params->get('twitter') != '') : ?>
							<li><a target="_blank" id="twitter" title="Visit us on Twitter" href="<?php echo $this->params->get('twitter') ?>">
								<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/social-icons/twitter.png" alt="" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ($this->params->get('youtube') != '') : ?>
							<li><a target="_blank" id="youtube" title="Visit us on YouTube" href="<?php echo $this->params->get('youtube') ?>">
								<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/social-icons/youtube.png" alt="" />
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ($this->params->get('rss') != '') : ?>
							<li><a target="_blank" id="rss" title="rss" href="<?php echo $this->params->get('rss') ?>">
								<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/social-icons/rss.png" alt="" />
								</a>
							</li>
						<?php endif; ?>
						</ul>
					</div>
					
					<div id="copyright"> 
						<?php if($this->countModules('copyright')) : ?>
						<div class="copyright">
							<jdoc:include type="modules" name="copyright" />
						</div>
						<?php endif; ?>
						<ul class="menu">
							<li><a title="joomfreak" target="_blank" href="#">Privacy Policy</a></li>
							<li class="last"><a title="Rasenfix" target="_blank" href="#">Site Map</a></li>
						</ul>
					</div>

				</div>
			<?php endif; ?>
									
				<?php if($this->countModules('user5')) : ?>
					<div class="user5 user" style="width:<?php echo $botsl['user5']['width']; ?>"> 
						<jdoc:include type="modules" name="user5" style="xhtml" />
					</div>
					<?php endif; ?>
				
					<?php if($this->countModules('user6')) : ?>
					<div class="user6 user" style="width:<?php echo $botsl['user6']['width']; ?>"> 
						<jdoc:include type="modules" name="user6" style="xhtml" />
					</div>
					<?php endif; ?>
			
				<div class="clr"></div>
									
				</aside>
				<?php endif; ?>
				<?php endif; ?>

				<?php
				/*
				ATTENTION PLEASE - Creative Commons, Attribution 2.5 Generic (CC BY 2.5)                
                1.1 Unlimited usage: joomfreak grants you the right of unlimited usage of its free download products.
                You are not allowed to remove, modify or change the footer area and credits area copyright link if you are going to use joomfreak software for free.
                1.2 Commercial license
                For a fee of € 20,00 you are allowed to remove the copyright in your joomfreak.com product.
                You can use the license for 1 domain.
                It does not matter if you are going to use the product for private or commercial scope or if you are private person or firm.
                If u need help to remove the copyright just send us a email at info@joomfreak.com.
                You can obtain a Commercial license here : http://www.joomfreak.com/terms-of-use.html
                */
				echo $jf; ?>
				
		</div>
	</div>
</div>
</body>
</html>
