jQuery.noConflict();
jQuery('document').ready(function() {
	
	jQuery('.deleteme').remove();
	
	var moduletype = jQuery("#jform_params_moduletype").val();	
		
	showHideYoutubeOption(moduletype);
	showHideFontResponsive();
	
	setTimeout('setHeightPanel();', 1000);

	jQuery("#jform_params_moduletype").change(function() {
			moduletype = jQuery("#jform_params_moduletype").val();
			
			showHideYoutubeOption(moduletype);
			
			setTimeout('setHeightPanel();', 100);
		});
		
	jQuery("#jformparamsslideoption_textresponsive").change(function() {
			
			showHideFontResponsive();
		
			setTimeout('setHeightPanel();', 100);
		});
		
	jQuery("#jformparamsslideoption_slidetype").change(function() {
		
			showHideSlideOption();			
			setTimeout('setHeightPanel();', 100);
		});
	
	jQuery('.slideConfigTitle').click(function(event){
		event.preventDefault();
		
		if(jQuery(this).hasClass('Opened')){ 
			jQuery(this).removeClass('Opened');
			jQuery(this).parents('p:first').next().slideUp('fast', function(){setHeightPanel()});
		}else{
			jQuery('.slideConfigTitle').removeClass('Opened');
			jQuery('.slideconfig').slideUp('fast', function(){setHeightPanel()});
			
			jQuery(this).addClass('Opened');
			jQuery(this).parents('p:first').next().slideDown('fast', function(){setHeightPanel()});
		}		
	});
	jQuery('.fontpre').each(function(){
		var font = jQuery(this).val();
		jQuery(this).next().addClass(font);
	});
	
	jQuery("#jformparamsslideoption_arrow").change(function() {			
			var img = 'next'+jQuery(this).val()+'.png';
			
			jQuery(this).next().attr('src', jQuery('#assetsPath').val()+'img/arrows/'+img);
			
		});
	
	
});
function setHeightPanel(){	
	jQuery('#menu-pane .jpane-slider').height(jQuery('#menu-pane .jpane-slider table').height());	
}


function showHideYoutubeOption(show){
	if(show == 1){
		jQuery('#youtubeoption').parents('li:first').show();
		jQuery('#slideshowoption').parents('li:first').hide();
	}else{
		jQuery('#youtubeoption').parents('li:first').hide();
		jQuery('#slideshowoption').parents('li:first').show();
		showHideSlideOption();
	}	
}

function showHideSlideOption(){
	var slidetype = jQuery("#jformparamsslideoption_slidetype").val();
	if(slidetype == 0){ // supersized		
		jQuery('#bgssoption').show();
		jQuery('#ssoption').hide();
	}else{ // responsive
		jQuery('#bgssoption').hide();
		jQuery('#ssoption').show();
	}
}
function fontpreview(obj){
	var font = jQuery(obj).val();
	//reset class
	jQuery(obj).next().attr('class', '');
	if(font != 'none'){
		jQuery(obj).next().addClass(font);
	}
}
function showHideFontResponsive(){
	
	var type = jQuery("#jformparamsslideoption_textresponsive").val();
	if(type == 0){
		jQuery('.jffonsize').show();
	}else{
		jQuery('.jffonsize').hide();
	}
}