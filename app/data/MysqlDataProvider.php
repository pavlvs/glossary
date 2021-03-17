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
        $sql = 'SELECT * FROM terms';
        return $this->query($sql);
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
        $sql = 'SELECT * FROM terms WHERE term LIKE :search OR definition LIKE :search';
        return $this->query($sql, [':search' => '%' . $search . '%']);
    }

    public function addTerm($term, $definition)
    {
        $sql = 'INSERT INTO terms (term, definition) VALUES (:term, :definition)';
        $this->execute($sql, [
            ':term' => $term,
            ':definition' => $definition
        ]);
    }

    public function updateTerm($id, $newTerm, $newDefinition)
    {
        $sql = 'UPDATE terms SET term = :term, definition = :definition WHERE id = :id';
        $this->execute($sql, [
            ':id' => $id,
            ':term' => $newTerm,
            ':definition' => $newDefinition
        ]);
    }

    public function deleteTerm($term)
    {
        $sql = 'DELETE FROM terms WHERE id = :id';
        $this->execute($sql, [
            ':id' => $term
        ]);
    }

    private function query($sql, $parameters = [])
    {
        $db = $this->connect();
        if ($db == null) {
            return [];
        }

        $query = null;

        if (empty($parameters)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($parameters);
        }
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;
        $db = null;
        return $data;
    }

    private function execute($sql, $parameters = [])
    {
        $db = $this->connect();
        if ($db == null) {
            return [];
        }

        $query = $db->prepare($sql);
        $query->execute($parameters);

        $query = null;
        $db = null;
    }
}
