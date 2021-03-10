<?php

require '../app/app.php';

if (isGet()) {
    $key = sanitize($_GET['key']);

    if (empty($key)) {
        view('not_found');
        die();
    }

    $term = getTerm($key);

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
        updateTerm($originalTerm, $term, $definition);
        redirect('index.php');
    }
}
