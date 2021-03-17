<?php
session_start();
require '../app/app.php';

ensureUserIsAuthenticated();

if (isPost()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);

    if (empty($term) || empty($definition)) {
        // TODO: warn user
    } else {
        Data::addTerm($term, $definition);
        redirect('index.php');
    }
}

view('admin/create');
