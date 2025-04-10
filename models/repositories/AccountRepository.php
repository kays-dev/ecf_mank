<?php

require_once __DIR__ . '/../Account.php';

class AccountRepository
{

    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function addAccount(Account $account): bool
    {
        $statement = $this->connection->getConnected()->prepare("INSERT INTO comptes (account_rib, account_type, account_balance, client_id) VALUES (:rib, :type, :solde, :id_client);");
        
        return $statement->execute([
            'rib' => $account->getRib(),
            'type' => $account->getType(),
            'solde' => $account->getSolde(),
            'id_client' => $account->getIdClient()
        ]);

    }

    public function viewAccounts(): array
    {
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM comptes;");

        $statement->execute();

        $resultArr = $statement->fetchAll();

        $accounts = [];
        foreach ($resultArr as $arrRow) {
            $account = new Account();
            $account->setId($arrRow['account_id']);
            $account->setRib($arrRow['account_rib']);
            $account->setType($arrRow['account_type']);
            $account->setSolde($arrRow['account_balance']);
            $account->setIdClient($arrRow['client_id']);

            $accounts[] = $account;
        }
        return $accounts;
    }

    public function viewAccountsByClient($clientId): array{
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM comptes WHERE client_id=$clientId;");

        $statement->execute();

        $resultArr = $statement->fetchAll();

        $accounts = [];
        foreach ($resultArr as $arrRow) {
            $account = new Account();
            $account->setId($arrRow['account_id']);
            $account->setRib($arrRow['account_rib']);
            $account->setType($arrRow['account_type']);
            $account->setSolde($arrRow['account_balance']);

            $accounts[] = $account;
        }

        return $accounts;

    }

    public function viewAccount(int $id): ?Account
    {
        $statement = $this->connection->getConnected()->prepare("SELECT * FROM comptes WHERE account_id=$id;");

        $statement->execute();

        $resultVal = $statement->fetch();

        if (!$resultVal) {
            return null;
        }

        $account = new Account();
        $account->setId($resultVal['account_id']);
        $account->setRib($resultVal['account_rib']);
        $account->setType($resultVal['account_type']);
        $account->setSolde($resultVal['account_balance']);
        $account->setIdClient($resultVal['client_id']);

        return $account;
    }

    public function updateAccount(Account $account): bool
    {

        $statement = $this->connection->getConnected()->prepare("UPDATE comptes SET account_rib=:rib, account_type=:type, account_balance=:solde, client_id=:id_client WHERE account_id=:id");

        return $statement->execute([
            'id' => $account->getId(),
            'rib' => $account->getRib(),
            'type' => $account->getType(),
            'solde' => $account->getSolde(),
            'id_client' => $account->getIdClient()
        ]);

    }

    public function deleteAccount(int $id): bool
    {
        
        $statement = $this->connection->getConnected()->prepare("DELETE FROM comptes WHERE account_id=:id");
        $statement->bindParam(':id', $id);

        return $statement->execute();

    }
}