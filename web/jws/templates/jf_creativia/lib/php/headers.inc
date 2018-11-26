<?php
/*------------------------------------------------------------------------
# JF CREATIVIA - JOOMFREAK.COM JOOMLA 2.5.0 TEMPLATE 02-2013
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2013 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE:  http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL:  info@joomfreak.com
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');
function HandelSession() 
{ 
 session_start(); 
} 

function CheckHeaders() 
{ 
HandelSession(); 
if (!isset($_SESSION['FirstVisitOfDay'])) 
{ 
  ShowFirstVisit(); 
  $_SESSION['FirstVisitOfDay']="1";
 } 
 else 
 { 
  ShowRemainingVisits(); 
 } 
} 

function ShowFirstVisit() 
{
	print("<style type='text/css'>div#startingpage-logo {	width: <?php echo $imgwidth; ?>px;	height: <?php echo $imgheight; ?>px;	margin-left: -<?php echo $imgwidth/2; ?>px;	margin-top: -<?php echo $imgheight/2; ?>px;}</style>");
	print("<div id='soverlay'><div id='startingpage-logo'><a href='#' title='<?php echo htmlspecialchars($app->getCfg('sitename')); ?>'><img src='<?php echo $spagen; ?>' width='<?php echo $imgwidth; ?>' height='<?php echo $imgheight; ?>' alt='' /></a></div></div><script>$('#soverlay').click(function () { $('#soverlay').fadeOut('slow');});</script>");
} 

function ShowRemainingVisits()
{}
?>