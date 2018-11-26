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

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldHeader extends JFormField
{
	protected $type = 'Header';

	function getInput()
	{
		return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
	}
	
	function fetchElement($name, $value, &$node, $control_name)
	{
		$options = array(JText::_($value));
		foreach ($node->children() as $option)
		{
			$options[] = $option->data();
		}
		
		return sprintf('<div style="float: left; width: 100%%; font-weight: bold; font-size: 120%%; color: #FFF; background-color: #3D7ABA; padding: 5px 0; text-align: center;margin-bottom:10px;">%s</div>', call_user_func_array('sprintf', $options));
	}
}
?>