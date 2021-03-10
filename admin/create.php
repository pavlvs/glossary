<?php

require '../app/app.php';

if (isPost()) {
    $term = sanitize($_POST['term']);
    $definition = sanitize($_POST['definition']);

    if (empty($term) || empty($definition)) {
        // TODO: warn user
    } else {
        addTerm($term, $definition);
        redirect('index.php');
    }
}

view('admin/create');
