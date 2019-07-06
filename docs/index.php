<?php

ini_set('error_reporting',E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

include_once "markdown.php";

$headline = "Research-to-Development Specialist";
$city = "San Francisco, CA";

$description_nohtml = "$headline in $city";
$description_html = "$headline<br/>$city<br><a href=\"mailto:phil@boundlabs.com\">phil@boundlabs.com</a><br><br>";

$title = "Phil Dhingra";

$articles = article('weird-hours') . article('permanote') . article('whack');

function article($name) {
	$template = file_get_contents("contents/_template.txt");
	$copy = str_replace('$name',$name,$template);
	$copy = str_replace('$body',Markdown(file_get_contents("contents/$name.txt")),$copy);
	return $copy;
}

include_once "source.html";

?>