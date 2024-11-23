<?php

ini_set('error_reporting',E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

include_once "markdown.php";

$description_nohtml = "Philip Dhingra's AGI Research Lab";

$old_description_html = '
Philip Dhingra\'s AGI Research Lab<br/>
View my <a href="https://www.linkedin.com/in/philipkd">LinkedIn</a> or<br/>
<a href="https://philipkd.com/">Personal Home Page</a><br/>
<br/>';

$description_html = '
Philip Dhingra\'s AGI Research Lab<br/>
Check out my <a href="https://github.com/philipkd/Reasoning-LLMs">latest thoughts on Reasoning LLMs</a> or<br/>
my <a href="https://philipkd.com/">personal home page</a><br/>
<br/>';

$browser_title = "Bound Labs by Philip Dhingra";

$title = "Bound Labs";

$articles_order = ['permanote','titan-seal','whack','landemic'];

$articles = "";

// foreach ($articles_order as $article) {
// 	$articles .= article($article);
// }

function article($name) {
	$body = Markdown(file_get_contents(dirname(__FILE__) . "/contents/$name.txt"));
	ob_start();
	include dirname(__FILE__) . "/template/_article.php";
	return ob_get_clean();
}

include dirname(__FILE__) . "/template/index.php";

?>