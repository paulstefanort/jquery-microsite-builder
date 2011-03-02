<?php
// get contents of current directory
$directory = __DIR__;
$directory = str_replace('ajax', 'output', $directory);
$file_count = count(glob($directory . '/*'));

if ($file_count > 50) {
	`rm $directory/*.html`;
}

$new_file = 'microsite-' . time() . rand(1, 1000) . '.html';

$main_content = $_POST['information'];
$site_title = $_POST['title'];

// main_content must be under 2 million characters
if (strlen($main_content) < 2000000) {
	ob_start();
	require 'template.php';
	$result = ob_get_clean();

	$result = preg_replace('/\s\s+/', ' ', $result);

	$output = fopen('../output/' . $new_file, 'w');
	fwrite($output, $result);

	$file_link = "<a href=\"/output/$new_file\">Download $new_file</a> or <a href=\"/\">Start Over</a>";

	echo json_encode(array(
		'result' => $file_link,
	));
} else {
	echo json_encode(array(
		'result' => 'Your microsite is too large. Please create a smaller one.'
	));
}