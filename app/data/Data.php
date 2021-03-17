<?php

require 'DataProvider.php';
class Data
{
    private static $dataStore;

    public static function initialize(DataProvider $dataProvider)
    {
        return self::$dataStore = $dataProvider;
    }

    public static function getTerm()
    {
        return self::$dataStore->getTerm();
    }

    public static function getTerms()
    {
        return self::$dataStore->getTerms();
    }

    public static function searchTerms($search)
    {
        return self::$dataStore->searchTerms($search);
    }

    public static function addTerm($term, $definition)
    {
        return self::$dataStore->addTerm($term, $definition);
    }

    public static function updateTerm($originalTerm, $newTerm, $newDefinition)
    {
        return self::$dataStore->updateTerm($originalTerm, $newTerm, $newDefinition);
    }

    public static function deleteTerm($term)
    {
        return self::$dataStore->deleteTerm($term);
    }
}
