<?php

class BooksCategory extends QueryBuilder {
    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'categories';
        $this->col_name = array('id','name', 'modified_at');
        $this->values = [];
    }
    public function listCategories() {
        return parent::list($this->table,$this->col_name);
    }
    public function listBooks($id){
        return parent::select('has_category','category_id',$this->values,$id);
    }
}