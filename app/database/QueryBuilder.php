<?php

class QueryBuilder
{
    public $pdo;

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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function update($table, $update, $check, $hash)
    {
        $str = ',';
        foreach ($update as $key => $value) {
            $str = $str . $key . "='${value}',";
        }
        $str = trim($str, ',');
        $stmt = $this->pdo->prepare("UPDATE ${table} SET ${str} WHERE ${check} ='{$hash}'");
        return $stmt;
    }
    public function deleteAll($table, $name, $value)
    {
        $stmt = $this->pdo->prepare("DELETE FROM ${table} WHERE ${name} = '${value}'");
        return $stmt;
    }
    public function delete($table, $name1, $value1, $name2, $value2)
    {
        $stmt = $this->pdo->prepare("DELETE FROM ${table} WHERE ${name1} = '${value1}' and ${name2} = '${value2}'");
        return $stmt;
    }
}
