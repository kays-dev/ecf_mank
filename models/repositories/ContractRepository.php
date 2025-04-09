<?php

require_once __DIR__ . '/../Contract.php';

class ContractRepository
{

    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function addContract(Contract $contract): bool
    {
        $statement = $this->connection->getConnected()->prepare("INSERT INTO contracts (contract_type, contract_sum, contract_duration, client_id) VALUES (:type, :montant, :duree, :id_client);");

        return $statement->execute([
            'type' => $contract->getType(),
            'montant' => $contract->getMontant(),
            'duree' => $contract->getDuree(),
            'id_client' => $contract->getIdClient()
        ]);

    }

    public function viewContracts(): array
    {
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM contracts;");

        $statement->execute();

        $resultArr = $statement->fetchAll();

        $contracts = [];
        foreach ($resultArr as $resultVal) {
            $contract = new Contract();
            $contract->setId($resultVal['contract_id']);
            $contract->setType($resultVal['contract_type']);
            $contract->setMontant($resultVal['contract_sum']);
            $contract->setDuree($resultVal['contract_duration']);
            $contract->setIdClient($resultVal['client_id']);

            $contracts[] = $contract;
        }
        return $contracts;
    }

    public function viewContract(int $id): ?Contract
    {
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM contracts WHERE contract_id=$id;");

        $statement->execute();

        $resultVal = $statement->fetch();

        if (!$resultVal) {
            return null;
        }

        $contract = new Contract();
        $contract->setId($resultVal['contract_id']);
        $contract->setType($resultVal['contract_type']);
        $contract->setMontant($resultVal['contract_sum']);
        $contract->setDuree($resultVal['contract_duration']);
        $contract->setIdClient($resultVal['client_id']);

        return $contract;
    }

    public function updateContract(Contract $contract): bool
    {

        $statement = $this->connection->getConnected()->prepare("UPDATE contracts SET contract_type=:type,contract_sum=:montant, contract_duration=:duree, client_id=:id_client,  WHERE contract_id=:id");

        return $statement->execute([
            'id' => $contract->getId(),
            'type' => $contract->getType(),
            'montant' => $contract->getMontant(),
            'duree' => $contract->getDuree(),
            'id_client' => $contract->getIdClient()
        ]);

    }

    public function deleteContract(int $id): bool
    {

        $statement = $this->connection->getConnected()->prepare("DELETE FROM contracts WHERE contract_id=:id");
        $statement->bindParam(':id', $id);

        return $statement->execute();

    }
}