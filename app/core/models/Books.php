<?php

class Books extends QueryBuilder
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'books';
        $this->col_name = array('id', 'name', 'author', 'edition', 'image');
        $this->values = [];
    }
    public function listBooks()
    {
        return parent::list($this->table, $this->col_name);
    }
    public function addBook()
    {
        $values = [];
        $values[0] = "'" . trim($_POST['name']) . "'";
        $values[1] = "'" . trim($_POST['author']) . "'";
        $values[2] = "'" . trim($_POST['edition']) . "'";
        $values[3] = "'" . trim(basename($_FILES["image"]["name"])) . "'";
        array_shift($this->col_name);
        $stmt = parent::insert($this->table, $this->col_name, $values);
        $stmt->execute();
        $book_id = $this->pdo->lastInsertId();
        return $book_id;
    }
    public function deleteBook($id)
    {
        return parent::deleteAll($this->table, 'id', $id);
    }
    public function addCategories($book_id, $categories)
    {
        $this->col_name = array('book_id', 'category_id');
        foreach ($categories as $category) {
            $this->values = ["'${book_id}'", "'${category}'"];
            $res = parent::insert('has_category', $this->col_name, $this->values);
            $res->execute();
        }
    }
    public function deleteAllCategories($book_id)
    {
        parent::deleteAll('has_category', 'bid', $book_id);
    }
    public function listBookss()
    {

        $stmt = parent::list($this->table, $this->col_name);
        foreach ($stmt as $row) :
            $id = $row['id'];
        endforeach;
        $this->col_name = array('category_id');
        $this->values = array('book_id');
        $stmt = parent::select('has_category', $this->col_name, $this->values, $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function catName($cat_name)
    {
        $this->col_name = array('name');
        $this->values = array('id');
        $stmt = parent::select('categories', $this->col_name, $this->values, $cat_name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
