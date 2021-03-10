<?php

function getData()
{
    $jason = '';

    $filename = CONFIG['dataFile'];
    if (!file_exists($filename)) {
        file_put_contents($filename, '');
    } else {
        $jason = file_get_contents($filename);
    }

    return $jason;
}

function getTerms()
{
    $json = getData();

    return json_decode($json);
}

function getTerm($term)
{
    $terms = getTerms();

    foreach ($terms as $item) {
        if ($item->term == $term) {
            return $item;
        }
    }
    return false;
}
