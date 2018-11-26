<?php
/**
 * @package     JFSS | joomfreak slideshow
 * @link        http://www.joomfreak.com
 * @version     1.0
 * @copyright   Copyright (C) 2013 www.joomfreak.com
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
defined('_JEXEC') or die('Restricted access');

$siteUrl = JURI::root();

$assetsPath = 'modules/mod_jfslideshow/assets/';

$document = JFactory::getDocument();

$document->addScript($siteUrl.$assetsPath.'js/jquery.min.js');
$document->addScriptDeclaration('jQuery.noConflict();');
$document->addScript($siteUrl.$assetsPath.'js/jquery.tubular.1.0.js');
$document->addScript($siteUrl.$assetsPath.'js/javascript.js');
$document->addStyleSheet($siteUrl.$assetsPath.'css/tubular.css');

$videoId = $params->get('youtubeoption_id');
$startPosition = $params->get('youtubeoption_start');
$mute		= $params->get('youtubeoption_mute', '1');
$repeat		= $params->get('youtubeoption_repeat', '1');

$jfmodhtml = "

jQuery('document').ready(function() {
	
	var options = { videoId: '$videoId', start: $startPosition, repeat:false, mute: $mute, repeat: $repeat };
	
	jQuery('body').wrapInner('<div id=\"jf-divtubular\" />');
	
	jQuery('#jf-divtubular').tubular(options);
	
});
";

$document->addScriptDeclaration($jfmodhtml);