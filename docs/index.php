<?php

$contents = file_get_contents('source.html');

$contents = str_replace("</style>",'</style><link rel="stylesheet" href="custom.css">', $contents);

// $contents = str_replace('<script src="http://static.tumblr.com/vr9xgox/2VWmqthak/main-min.js"></script>', '', $contents);

print $contents;

?>