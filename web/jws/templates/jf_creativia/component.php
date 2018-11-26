<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$doc = JFactory::getDocument();

$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/system/css/general.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/menu.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/media_queries.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/style.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/k2.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/responsive.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/component.css', $type = 'text/css');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
</head>
<body class="contentpane">
	<div id="all">
		<div class="wrapper clearfix">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	</div>
</body>
</html>
