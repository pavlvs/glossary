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

function isGet()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function sanitize($value)
{
    $temp = filter_var(trim($value), FILTER_SANITIZE_STRING);

    if ($temp === false) {
        return '';
    }

    return $temp;
}

function authenticateUser($email, $password)
{
    $users = CONFIG['users'];
    if (!isset($users[$email])) {
        return false;
    }
    $userPassword = $users[$email];
    return $password == $userPassword;
}

function isUserAuthenticated()
{
    return isset($_SESSION['email']);
}

function ensureUserIsAuthenticated()
{
    if (!isUserAuthenticated()) {
        redirect('../login.php');
    }
}
