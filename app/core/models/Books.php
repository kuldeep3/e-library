<?php

class Books extends QueryBuilder
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'books';
        $this->col_name = array('id', 'name', 'author', 'edition', 'image');
    }
    public function listBooks()
    {
        return parent::list($this->table,$this->col_name);
    }
    public function addBook(){
        $values =[];
        $values[0] = "'" . trim($_POST['name']) . "'";
        $values[1] = "'" . trim($_POST['author']) . "'";
        $values[2] = "'" . trim($_POST['edition']) . "'";
        $values[3] = "'" . trim(basename($_FILES["image"]["name"])) . "'";
        array_shift($this->col_name);
        $stmt = parent::insert($this->table,$this->col_name,$values);
        $stmt->execute();
    }
}
