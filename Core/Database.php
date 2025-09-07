<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;
    public ?PDOStatement $statement = null;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get(): array
    {
        $results = $this->statement->fetchAll();
        if (!$results) {
            return [];
        }
        return $results;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): ?array
    {
        $result = $this->find();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }
        return $result;
    }
}