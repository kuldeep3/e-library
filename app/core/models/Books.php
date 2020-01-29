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
        
    }
}
