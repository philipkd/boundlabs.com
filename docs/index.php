<?php

ini_set('error_reporting',E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

include_once "markdown.php";

$headline = "Tech Founder";
$city = "San Francisco, CA";

$description_nohtml = "$headline in $city";
$description_html = "$headline<br/>$city<br><a href=\"mailto:phil@boundlabs.com\">phil@boundlabs.com</a><br><br>";

$title = "Phil Dhingra";

$articles_order = ['permanote','titan-seal','whack','landemic'];

$articles = "";

foreach ($articles_order as $article) {
	$articles .= article($article);
}

function article($name) {
	$body = Markdown(file_get_contents(dirname(__FILE__) . "/contents/$name.txt"));
	ob_start();
	include dirname(__FILE__) . "/template/_article.php";
	return ob_get_clean();
}

include dirname(__FILE__) . "/template/index.php";

?>