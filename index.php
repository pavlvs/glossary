<?php
require 'inc/functions.php';

$title = 'hello,  cruel world';

$viewBag = [];

$viewBag['title'] = 'This is the title';

view('index', $title);
