<?php

ini_set('error_reporting',E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

include_once "markdown.php";

$contents = file_get_contents('source.html');

$contents = str_replace("</style>",'</style><link rel="stylesheet" href="custom.css">', $contents);

$contents = str_replace('$description-nohtml',"Research-to-Development Lab in San Francisco, CA",$contents);
$contents = str_replace('$description-html','Research-to-Development Lab<br/>San Francisco, CA<br/><a href="mailto:phil@boundlabs.com">phil@boundlabs.com</a>',$contents);

$articles = article('permanote') . article('whack');

$contents = str_replace('$articles',$articles,$contents);

// $contents = str_replace('<script src="http://static.tumblr.com/vr9xgox/2VWmqthak/main-min.js"></script>', '', $contents);

print $contents;

function article($name) {
	$template = file_get_contents("contents/_template.txt");
	$copy = str_replace('$name',$name,$template);
	$copy = str_replace('$body',Markdown(file_get_contents("contents/$name.txt")),$copy);
	return $copy;
}

?>