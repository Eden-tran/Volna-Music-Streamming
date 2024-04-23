<?php
class database
{
    var  $sql, $statement;
    protected $pdo;
    function __construct()
    {
        $this->pdo = connection::getInstance();
    }
    function setquery($sql)
    {
        $this->sql = $sql;
        return $this;
    }
    function query($sql)
    {
        $state = $this->pdo->prepare($sql);
        $state->execute();
        return $state;
    }
    function loadrow($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $errors) {
            exit('SQL Error: ' . $errors->getMessage());
        }
    }
    function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
    function loadrows($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $errors) {
            exit('SQL Error: ' . $errors->getMessage());
        }
    }
    function save($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);

            return $this->statement->execute($params);
        } catch (PDOException $errors) {
            exit('SQL Error: ' . $errors->getMessage());
        }
    }
    function disconnect()
    {
        $this->pdo = $this->statement = null;
        $this->sql = '';
    }
}