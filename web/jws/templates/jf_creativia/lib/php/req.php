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
// no direct access
defined('_JEXEC') or die('Restricted access');
$app = JFactory::getApplication();
JHTML::_('behavior.framework', true);
JHTML::_('behavior.modal' );
$path = $this->baseurl.'/templates/'.$this->template;
$fpage = $this->params->get('fpage');
$startingpage = $this->params->get('startingpage');
$startingpagedebug = $this->params->get('startingpagedebug');
$spagen = $this->params->get('spagen');
$image_Name = $this->params->get('spagen');
list($imgwidth, $imgheight) = getimagesize($image_Name);
$templatewidth = $this->params->get('templatewidth');
$font = $this->params->get('font');
$font_content = $this->params->get('font_content');
#$jf='<div class="jf" ><a class="jflink" target="_blank" href="http://www.joomfreak.com" title="">joomfreak</a></div>';
if ($this->params->get('fontSize') == '') 
{ $fontSize ='0.75em'; } 
else { $fontSize = $this->params->get('fontSize'); }

class Tools {
	var $_tpl = null;
	var $template = '';

	function Tools ($template, $_params_cookie=null) {
		$this->_tpl = $template;
		$this->template = $template->template;
	}
	function calSpotlight ($spotlight, $totalwidth=100, $firstwidth=0) {

		$modules = array();
		$modules_s = array();
		foreach ($spotlight as $position) {
			if( $this->_tpl->countModules ($position) ){
				$modules_s[] = $position;
			}
			$modules[$position] = array('class'=>'-full', 'width'=>$totalwidth);
		}

		if (!count($modules_s)) return null;

		if ($firstwidth) {
			if (count($modules_s)>1) {
				$width = round(($totalwidth-$firstwidth)/(count($modules_s)-1),1) . "%";
				$firstwidth = $firstwidth . "%";
			}else{
				$firstwidth = $totalwidth . "%";
			}
		}else{
			$width = round($totalwidth/(count($modules_s)),1) . "%";
			$firstwidth = $width;
		}

		if (count ($modules_s) > 1){
			$modules[$modules_s[0]]['class'] = "-left";
			$modules[$modules_s[0]]['width'] = $firstwidth;
			$modules[$modules_s[count ($modules_s) - 1]]['class'] = "-right";
			$modules[$modules_s[count ($modules_s) - 1]]['width'] = $width;
			for ($i=1; $i<count ($modules_s) - 1; $i++){
				$modules[$modules_s[$i]]['class'] = "-center";
				$modules[$modules_s[$i]]['width'] = $width;
			}
		}
		return $modules;
	}
}

$tmpTools = new Tools($this);
