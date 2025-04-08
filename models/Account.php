<?php

require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/Client.php';

class Account
{

    private int $id;
    private string $rib;
    private string $type;
    private float $solde;
    private int $id_client;

    public function getId(): int
    {
        return $this->id;
    }
    public function getRib(): string
    {
        return $this->rib;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getSolde(): float
    {
        return $this->solde;
    }
    public function getIdClient(): int
    {
        return $this->id_client;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setRib(string $rib): void
    {
        $this->rib = htmlspecialchars($rib);
    }
    public function setType(string $type): void
    {
        $this->type = htmlspecialchars($type);
    }
    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }
    public function setIdClient(int $idClient): void
    {
        $this->id_client = $idClient;
    }



}