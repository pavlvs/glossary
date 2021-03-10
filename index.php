<?php

require 'app/app.php';

$viewBag = [
    'title' => 'Glossary List'
];

view('index', getTerms());
