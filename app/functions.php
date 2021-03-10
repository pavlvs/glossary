<?php

function view($name, $data = '')
{
    global $viewBag;
    require APP_PATH . 'views/layout.view.php';
}

function redirect($url)
{
    header("Location: $url");
    die();
}
