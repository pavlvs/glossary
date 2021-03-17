<?php

require 'app/app.php';

$viewBag = [
    'title' => 'Glossary List',
    'heading' => 'Glossary'
];
// die();

if (isset($_GET['search'])) {
    $items = Data::searchTerms($_GET['search']);

    $viewBag['heading'] = 'Search results for "' . $_GET['search'] . '"';
} else {
    $items = Data::getTerms();
}

view('index', $items);
