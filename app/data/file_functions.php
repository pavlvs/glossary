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

function searchTerms($search)
{
    // echo $search;
    $items = getTerms();

    $results = array_filter($items, function ($item) use ($search) {
        if (strpos($item->term, $search) !== false ||
            strpos($item->definition, $search) !== false) {
            return $item;
        }
    });

    return $results;
}
