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
        $db = $this->connect();
        if ($db == null) {
            return [];
        }

        $sql = 'SELECT * FROM terms';
        $query = $db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');
        $query = null;
        $db = null;
        return $data;
    }

    public function getTerm($term)
    {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM terms WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute([
            ':id' => $term
        ]);

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');
        if (empty($data)) {
            return;
        }
        $db = null;
        $query = null;
        return $data[0];
    }

    public function searchTerms($search)
    {
        $db = $this->connect();
        if ($db == null) {
            return [];
        }

        $sql = 'SELECT * FROM terms WHERE term LIKE :search OR definition LIKE :search';
        $query = $db->prepare($sql);
        $query->execute([
            ':search' => '%' . $search . '%'
        ]);

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;
        $db = null;

        return $data;
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
