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

    view('admin/delete', $term);
}

if (isPost()) {
    $term = sanitize($_POST['term']);

    if (empty($term)) {
        // TODO: warn user
    } else {
        deleteTerm($term);
        redirect('index.php');
    }
}
