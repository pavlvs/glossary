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

    view('admin/delete', $term);
}

if (isPost()) {
    $term = sanitize($_POST['term']);

    if (empty($term)) {
        // TODO: warn user
    } else {
        Data::deleteTerm($term);
        redirect('index.php');
    }
}
