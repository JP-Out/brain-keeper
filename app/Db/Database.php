<?php
namespace App\Db;

use PDO;
use PDOException;

class Database
{
    const HOST = 'localhost';
    const NAME = 'brain_keeper_crud';
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            error_log("Erro na consulta: " . $e->getMessage());
            return false;
        }
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($values), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ')
                 VALUES(' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }


    public function select($where = null, $order = null, $limit = null, $fields = "*", $params = [])
    {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query, $params);
    }


    public function update(array $values, array $conditions)
    {
        $setPart = [];
        $wherePart = [];

        // Prepara a parte SET da consulta
        foreach ($values as $column => $value) {
            $setPart[] = "$column = :$column";
        }
        $setClause = implode(', ', $setPart);

        // Prepara a parte WHERE da consulta
        foreach ($conditions as $column => $value) {
            $wherePart[] = "$column = :where_$column";
        }
        $whereClause = implode(' AND ', $wherePart);

        // Monta a consulta SQL
        $sql = "UPDATE {$this->table} SET $setClause WHERE $whereClause";

        try {
            $stmt = $this->connection->prepare($sql);

            // Vincula os valores para SET
            foreach ($values as $column => $value) {
                $stmt->bindValue(":$column", $value);
            }

            // Vincula os valores para WHERE
            foreach ($conditions as $column => $value) {
                $stmt->bindValue(":where_$column", $value);
            }

            // Executa a consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public function delete($where)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        // Log para depuração
        error_log("SQL Query: $query");
        return $this->execute($query);
    }

    public function getTable()
    {
        return $this->table;
    }
}
?>