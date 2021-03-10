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

function addTerm($term, $definition)
{
    $items = getTerms();
    $obj = (object) [
        'term' => $term,
        'definition' => $definition
    ];

    $items[] = $obj;
    setData($items);
}

function updateTerm($originalTerm, $newTerm, $newDefinition)
{
    $terms = getTerms();
    foreach ($terms as $item) {
        if ($item->term == $originalTerm) {
            $item->term = $newTerm;
            $item->definition = $newDefinition;
            break;
        }
    }
    $newTerms = array_values($terms);

    setData($newTerms);
}

function deleteTerm($term)
{
    $terms = getTerms();

    for ($i = 0; $i < count($terms); $i++) {
        if ($terms[$i]->term === $term) {
            unset($terms[$i]);
            break;
        }
    }
    setData($terms);
}

function setData($arr)
{
    $filename = CONFIG['dataFile'];

    $json = json_encode($arr);

    file_put_contents($filename, $json);
}
