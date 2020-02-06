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
    public function selectBook($id)
    {
        $this->values = array('id');
        return parent::select($this->table, $this->col_name, $this->values, $id);
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
        $this->deleteAllCategories($id);
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
        return parent::deleteAll('has_category', 'book_id', $book_id);
    }
    public function listBookss()
    {
        $stmt = parent::list($this->table, $this->col_name);
        $this->col_name = array('category_id');
        $this->values = array('book_id');
        $cat = [];
        foreach ($stmt as $row) :
            $id = $row['id'];
            $stmt = parent::select('has_category', $this->col_name, $this->values, $id);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            array_push($cat, $res);
        endforeach;
        return $cat;
    }
    public function catName($cat_name)
    {
        $this->col_name = array('name');
        $this->values = array('id');
        $stmt = parent::select('categories', $this->col_name, $this->values, $cat_name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateBook($booknames, $bookvalues, $id)
    {
        $i = 0;
        $update = [];
        while (isset($booknames[$i])) {
            $update += [$booknames[$i] => $bookvalues[$i]];
            $i++;
        }
        return (parent::update($this->table, $update, 'id', $id));
    }
    public function fetchCategories($book_id)
    {
        $this->col_name = array('category_id');
        $this->values = array('book_id');
        return parent::select('has_category', $this->col_name, $this->values, $book_id);
    }
}
