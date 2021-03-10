<?php

function view($name, $data = '')
{
    global $viewBag;
    require 'views/layout.view.php';
}

function redirect($url)
{
    header("Location: $url");
    die();
}
