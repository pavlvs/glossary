<?php

class FileDataProvider extends DataProvider
{
    private function getData()
    {
        $jason = '';

        if (!file_exists($this->source)) {
            file_put_contents($this->source, '');
        } else {
            $jason = file_get_contents($this->source);
        }

        return $jason;
    }

    public function getTerms()
    {
        $json = $this->getData();

        return json_decode($json);
    }

    public function getTerm($term)
    {
        $terms = $this->getTerms();

        foreach ($terms as $item) {
            if ($item->term == $term) {
                return $item;
            }
        }

        return false;
    }

    public function searchTerms($search)
    {
        // echo $search;
        $items = $this->getTerms();

        $results = array_filter($items, function ($item) use ($search) {
            if (strpos($item->term, $search) !== false ||
            strpos($item->definition, $search) !== false) {
                return $item;
            }
        });

        return $results;
    }

    public function addTerm($term, $definition)
    {
        $items = $this->getTerms();

        $items[] = new GlossaryTerm($term, $definition);

        $this->setData($items);
    }

    public function updateTerm($originalTerm, $newTerm, $newDefinition)
    {
        $terms = $this->getTerms();
        foreach ($terms as $item) {
            if ($item->term == $originalTerm) {
                $item->term = $newTerm;
                $item->definition = $newDefinition;
                break;
            }
        }
        $newTerms = array_values($terms);

        $this->setData($newTerms);
    }

    public function deleteTerm($term)
    {
        $terms = $this->getTerms();

        for ($i = 0; $i < count($terms); $i++) {
            if ($terms[$i]->term === $term) {
                unset($terms[$i]);
                break;
            }
        }
        $this->setData($terms);
    }

    private function setData($arr)
    {
        $json = json_encode($arr);

        file_put_contents($this->filePath, $json);
    }
}
