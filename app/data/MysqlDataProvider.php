<?php

class MysqlDataProvider extends DataProvider
{
    private function connect()
    {
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
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
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'INSERT INTO terms (term, definition) VALUES (:term, :definition)';
        $insert = $db->prepare($sql);
        $insert->execute([
            ':term' => $term,
            ':definition' => $definition
        ]);

        $insert = null;
        $db = null;
    }

    public function updateTerm($originalTerm, $newTerm, $newDefinition)
    {
    }

    public function deleteTerm($term)
    {
    }
}
