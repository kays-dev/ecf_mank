<?php

require_once __DIR__ . '/../Client.php';

class ClientRepository
{

    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function addClient(Client $client): bool
    {
        $statement = $this->connection->getConnected()->prepare("INSERT INTO clients (client_name, client_surname, client_mail, client_phone, client_location) VALUES (:nom, :prenom, :email, :telephone, :adresse);");

        return $statement->execute([
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'telephone' => $client->getTelephone(),
            'adresse' => $client->getAdresse(),
        ]);

    }

    public function viewClients(): array
    {
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM clients;");

        $statement->execute();

        $resultArr = $statement->fetchAll();

        $clients = [];
        foreach ($resultArr as $arrRow) {
            $client = new Client();
            $client->setId($arrRow['client_id']);
            $client->setNom($arrRow['client_name']);
            $client->setPrenom($arrRow['client_surname']);
            $client->setEmail($arrRow['client_mail']);
            $client->setTelephone($arrRow['client_phone']);
            $client->setAdresse($arrRow['client_location']);

            $clients[] = $client;
        }
        return $clients;
    }

    public function viewClient(int $id): ?Client
    {
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM clients WHERE client_id=$id;");

        $statement->execute();

        $resultVal = $statement->fetch();

        if (!$resultVal) {
            return null;
        }

        $client = new Client();
        $client->setId($resultVal['client_id']);
        $client->setNom($resultVal['client_name']);
        $client->setPrenom($resultVal['client_surname']);
        $client->setEmail($resultVal['client_mail']);
        $client->setTelephone($resultVal['client_phone']);
        $client->setAdresse($resultVal['client_location']);

        return $client;
    }

    public function updateClient(Client $client): bool
    {

        $statement = $this->connection->getConnected()->prepare("UPDATE clients SET client_name=:nom, client_surname=:prenom, client_mail=:email, client_phone=:telephone, client_location=:adresse WHERE client_id=:id");

        return $statement->execute([
            'id' => $client->getId(),
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'email' => $client->getEmail(),
            'telephone' => $client->getTelephone(),
            'adresse' => $client->getAdresse(),
        ]);

    }

    public function deleteClient(int $id): bool
    {

        $statement = $this->connection->getConnected()->prepare("DELETE FROM clients WHERE client_id=:id");
        $statement->bindParam(':id', $id);

        return $statement->execute();

    }
}