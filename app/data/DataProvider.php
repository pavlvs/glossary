<?php
require 'GlossaryTerm.php';

class DataProvider
{
    private $filePath;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function getTerms()
    {
    }

    public function getTerm($term)
    {
    }

    public function searchTerms($search)
    {
    }

    public function addTerm($term, $definition)
    {
    }

    public function updateTerm($originalTerm, $newTerm, $newDefinition)
    {
    }

    public function deleteTerm($term)
    {
    }
}
