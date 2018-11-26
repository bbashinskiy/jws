<?php
/**
 * @package     JFSS | joomfreak slideshow
 * @link        http://www.joomfreak.com
 * @version     1.0
 * @copyright   Copyright (C) 2013 www.joomfreak.com
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
defined('_JEXEC') or die('Restricted access');
$maxSlide = 10;
require_once dirname(__FILE__).'/helper.php';

$moduletype = $params->get('moduletype', 1);

$slidetype = $params->get('slideoption_slidetype', 1);

if($moduletype){
	$layout = 'youtube';	
}else{
	if($slidetype){
		$layout = 'slideshow';
	}else{
		$layout = 'bgslideshow';
	}
}

require JModuleHelper::getLayoutPath('mod_jfslideshow', $layout);