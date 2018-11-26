<?php
defined('_JEXEC') or die( 'Restricted access' );
class JFormFieldMap extends JFormField
{	
	var	$_name = 'Map';

	function getInput()
	{
		return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
	}

	function fetchElement($name, $value, &$node, $control_name)
	{
		
		$data = $this->form->getValue('params');
		$moduleParams = new JRegistry($data);
		
		ob_start();
		?>
		<div style="clear:both;"></div>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDqEFJTjKx6L-RpoT-nPiqTi1KJVJimH3I&sensor=false"></script>

		<script>
        var map;
		var lat = document.getElementById("jform_params_latitude").value;
		var long = document.getElementById("jform_params_longitude").value;
        var myCenter=new google.maps.LatLng(lat, long);
        
        function initialize()
        {
        	var mapProp = {
          	center: myCenter,
          	zoom: 16,
          	mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
		
		var marker = new google.maps.Marker({
			position: myCenter,
			draggable: true
		});
		
		marker.setMap(map);
		
		google.maps.event.addListener(marker, 'dragend', function (event) {
    		document.getElementById("jform_params_latitude").value = event.latLng.lat();
    		document.getElementById("jform_params_longitude").value = event.latLng.lng();
		});
        
        }
        
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <div id="googleMap" style="width: 100%; height:300px">
        </div>
		<?php		        
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
	}
}
