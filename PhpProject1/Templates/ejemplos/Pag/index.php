<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ 
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
 
<script type="text/javascript"> 
$(document).ready(function() 
{ 

function loading_show() 
{ 
$('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast'); 
} 

function loading_hide() 
{ 
$('#loading').fadeOut(); 
}  

function loadData(page) { 
	loading_show();  
	$.ajax 
	({ 
	type: "POST", 
	url: "load_data.php", 
	data: "page="+page, 
	success: function(msg) 
		{ 
		$("#container").ajaxComplete(function(event, request, settings) 
		{ 
		loading_hide(); 
		$("#container").html(msg); 
		}); 
		} 
	}); 
  }
  
   
loadData(1); // For first time page load default results 


$('#container .pagination li.active').live('click',function(){ 
	var page = $(this).attr('p'); 
	loadData(page); 
});  
}); 

</script> 
</head>

<body>
</body>
</html>