<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php echo $site_title; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
* {
	font-family:"Helvetica Neue", Arial, Helvetica;
	font-size:1em;
	font-size:14px;
	margin:0;
	padding:0;
}

body {
	
}

a {
	color:#37bfab;
}

#container {
	width:900px;
	margin:0 auto;
}

#header {
	margin-top:2em;
	margin-bottom:2em;
}

#header div {
	display:inline;
	margin:0;
	padding:0;
	width:50%;
}

#header h1 {
	font-size:2em;
	display:inline;
}

#footer {
	margin-top:1em;
	padding-top:1em;
	border-top:1px dashed #cecece;
}

#sections {
	border-bottom:1px solid #ccc;
	border-left:1px solid #ccc;
	overflow:hidden;
}

#section_list {
	display:inline;
	margin:0;
	padding:0;
	float:left;
}

#section_list li {
	display:block;
	padding-left:2em;
	padding-right:2em;
	padding-top:1em;
	padding-bottom:1em;
	float:left;
	border-right:1px solid #ccc;
	border-top:1px solid #ccc;
}

#section_list li:hover {
	background-color:#ccc;
	cursor:pointer;
}

#section_list li.current {
	background-color:#ccc;
}

#add_section {
	float:right;
	line-height:3em;
}

#section_content {
	clear:both;
	padding:2em;
}

#section_content > div {
	display:none;
}

#section_content > div .content {
	min-height:18em;
}

h1 {
	font-size:2em;
}

h2 {
	font-size:1.8em;
}

h3 {
	font-size:1.6em;
}

h4 {
	font-size:1.2em;
}

p {
	margin-top:1em;
}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
</head>
<body>

	<div id="container">
		<div id="header">
			<h1><?php echo $site_title; ?></h1>
		</div>
		
		<div id="main">
			<?php echo $main_content; ?>
		</div>
		
		<div id="footer">
			<p>&copy; <?php echo date('Y'); ?> | Powered by <a href="http://www.github.com/paulstefanort">jQuery Microsite Builder</a></p>
		</div>
		
	</div>

<script type="text/javascript">
$("#section_list li").live('click', function(e) {
	var section = $(this).attr('id');
	$(this).siblings().removeClass("current");
	$(this).addClass("current");
	$("#" + section + "_content").parent().children(":visible").hide();
	$("#" + section + "_content").fadeIn(1000, function() {});
});
</script>
</body>
</html>