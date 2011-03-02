<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>jQuery Microsite Builder</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="style/main.css">
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	<script type="text/javascript">
section_count=0;

	$(function() { 
		$("#section_list").sortable();
	});
	</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 id="site_title">jQuery Microsite Builder</h1>
			<a href="#" id="build">Build</a>
		</div>
		
		<div id="main">
			
			<div id="sections">
				<ul id="section_list">
				
				</ul>
				<a href="#" id="add_section">Add Section</a>
			</div>
			
			<div id="section_content">
				
			</div>
			
		</div>
		
		<div id="result">
			
		</div>
		
		<div id="footer">
			<p><a href="http://www.github.com/paulstefanort">jQuery Microsite Builder</a> &copy; <?php echo date('Y'); ?> <a href="http://www.paulstefanort.com">Paul Stefan Ort</a></p>
		</div>
	</div><!-- end of #container -->

<script type="text/javascript">
$(document).ready(function() {

});

$("#site_title").live('click', function(e) {
	var current_title = $(this).html();
	var new_markup = '<input id="new_site_title" type="text" value="' + current_title + '"><a href="#" id="build">Build</a>';
	$(this).parent().html(new_markup);
	$("#new_site_title").focus();
});

$("#new_site_title").live('blur', function(e) {
	var new_title = $(this).val();
	if (new_title != "") {
		var new_markup = '<h1 id="site_title">' + new_title + '</h1><a href="#" id="build">Build</a>';
		$(this).parent().html(new_markup);
	}
});

$("#add_section").live('click', function(e) {
	e.preventDefault();
	section_count++;
	$("#section_list").append('<li id="section_' + section_count + '"><span>New Section</span><div class="remove">X</div></li>');
	$("#section_content").append('<div id="section_' + section_count + '_content" class="section_content"><div class="content">New Section Content</div></div>');
});

$("#section_list li .remove").live('click', function(e) {
	var section = $(this).parent().attr('id');
	$("#" + section).remove();
	$("#" + section + "_content").remove();
});

$("#section_list li").live('click', function(e) {
	var section = $(this).attr('id');
	$(this).siblings().removeClass("current");
	$(this).addClass("current");
	$("#" + section + "_content").parent().children(":visible").hide();
	$("#" + section + "_content").fadeIn(1000, function() {});
});

$("#section_list li span").live('click', function(e) {
	var section = $(this).attr('id');
	var section_name = $(this).html();
	$(this).parent().html('<input type="text" id="section_name_' + section +'" value="' + section_name + '">');
	$("#section_name_" + section).focus();
});

$("#section_list li input").live('blur', function(e) {
	var section_name = $(this).val();
	$(this).parent().html('<span>' + section_name + '</span><div class="remove">X</div>');
});

$("#section_content div .content").live('click', function(e) {
	var new_id = $(this).parent().attr('id');
	var new_value = $(this).html();
/*	new_value = new_value.replace(/<br>/gi, '\n'); */
	$(this).parent().html('<textarea id="' + new_id + '_content">' + new_value + '</textarea>');
	$("#" + new_id + "_content").focus();
});

$("#section_content div textarea").live('blur', function(e) {
	var new_value = $(this).val();
/*	new_value = new_value.replace(/\n/g,'<br>'); */
	$(this).parent().html('<div class="content">' + new_value + '</div>');
});

$("#build").live('click', function(e) {
	e.preventDefault();
	
	$(".remove").remove();
	$("#add_section").remove();
	$("#build").remove();
	$("#section_list li").removeClass("current");
	$("#section_content .section_content").hide();
	$("#section_list li").first().addClass("current");
	$("#section_content .section_content").first().show();
	
	var body = $("#main").clone().html();
	var title = $("#site_title").clone().html();
	
	$.post("ajax/builder.php", { "information" : body, "title" : title }, 
	 function (data) {
		$("#result").html(data.result);
	}, "json");
	
});
</script>
</body>
</html>