<?php

class QueryBuilder
{
    // public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // public $col_name = [];
    //public $table;
    public function list($table, $col_name)
    {
        $col_name = implode(',', $col_name);
        $stmt = $this->pdo->prepare("SELECT ${col_name} FROM ${table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function insert($table, $col_name, $col_values)
    {
        $col_values = implode(',', $col_values);
        $col_name = implode(',', $col_name);
        $stmt = $this->pdo->prepare("INSERT INTO ${table} (${col_name}) VALUES (${col_values}) ");
        return $stmt;
    }
    // public function insert($table, $parameters) {
    //     $sql = sprintf(
    //         'insert into %s (%s) values (%s)',
    //         $table,
    //         implode(', ', array_values($parameters)),
    //         ':' . implode(', :', array_values($parameters))
    //     );
    //     $stmt = $this->pdo->prepare($sql);
    //     return $stmt;
        
    // }
    public function select($table, $col_name, $values, $param_values)
    {
        $col_name = implode(',', $col_name);
        $values = implode(',', $values);
        // $param_values = implode(',', $param_values);
        $stmt = $this->pdo->prepare("SELECT ${col_name} FROM ${table} WHERE ${values} = '${param_values}'");
        // $stmt->bindParam(:"${param_values}",${values},PDO::PARAM_STR);
        return $stmt;
    }
}
