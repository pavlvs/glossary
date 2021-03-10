<?php

function view($name, $data)
{
    global $viewBag;
    require 'views/layout.view.php';
}

function getData()
{
    $jason = '';

    $filename = CONFIG['dataFile'];
    if (!file_exists($filename)) {
        file_put_contents($filename, '');
    } else {
        $jason = file_get_contents($filename);
    }

    return $jason;
}
