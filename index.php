<?php

require 'app/app.php';

$viewBag = [
    'title' => 'Glossary List',
    'heading' => 'Glossary'
];
// die();

$data = new FileDataProvider(CONFIG['dataFile']);

if (isset($_GET['search'])) {
    $items = $data->searchTerms($_GET['search']);

    $viewBag['heading'] = 'Search results for "' . $_GET['search'] . '"';
} else {
    $items = $data->getTerms();
}

view('index', $items);
