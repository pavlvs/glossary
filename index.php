<?php

require 'app/app.php';

$data = getData();

// $title = 'hello,  cruel world';

// $viewBag = [];

// $viewBag['title'] = 'This is the title';

view('index', $data);
