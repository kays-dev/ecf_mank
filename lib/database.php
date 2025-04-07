<?php

class DatabaseConnection
{

    private ?\PDO $database = null;

    public function getConnected(): PDO
    {
        if ($this->database == null) {
            $host = 'localhost';
            $dbname = 'mank';
            $username = 'root';
            $password = '';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            try {
                $this->database = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                die('Impossible de se connecter à la base de données : ' . $e->getMessage());
            }
        }

        return $this->database;
    }



}