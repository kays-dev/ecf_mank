<?php

require_once __DIR__ . '/../User.php';

class UserRepository
{

    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getUser(string $email): ?Admin
    {

        $statement = $this->connection->getConnected()->prepare("SELECT * FROM adminuser WHERE email=:email");
        $statement->bindParam('email', $email);
        $statement->execute();

        $resultVal = $statement->fetch();

        if (!$resultVal) {
            return null;
        }

        $user = new Admin();
        $user->setId($resultVal['user_id']);
        $user->setEmail($resultVal['email']);
        $user->setMotDePasse($resultVal['password']);

        return $user;

    }
}