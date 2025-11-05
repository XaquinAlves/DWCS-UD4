<?php

declare(strict_types=1);

namespace Com\Daw2\Model;

use PDO;

class UsuarioModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->conectar();
    }

    private function conectar(): PDO
    {
        $host = $_ENV['db.host'];
        $db = $_ENV['db.schema'];
        $user = $_ENV['db.user'];
        $pass = $_ENV['db.pass'];
        $charset = $_ENV['db.charset'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true
        ];
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $pdo;
    }

}