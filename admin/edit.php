<?php
session_start();

require '../app/app.php';

ensureUserIsAuthenticated();

if (isGet()) {
    $key = sanitize($_GET['key']);

    if (empty($key)) {
        view('not_found');
        die();
    }

    $term = Data::getTerm($key);

    if ($term === false) {
        view('not_found');
        die();
    }

    view('admin/edit', $term);
}

if (isPost()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);
    $originalTerm = sanitize($_POST['original-term']);

    if (empty($term) || empty($definition) || empty($originalTerm)) {
        // TODO: warn user
    } else {
        Data::updateTerm($originalTerm, $term, $definition);
        // $host = $_SERVER['HTTP_HOST'];
        // $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // $extra = 'index.php';

        // header("Location: http://$host$uri/$extra", true);
        // exit;

        redirect('index.php');
    }
}
