<?php

require_once __DIR__ . '/../lib/database.php';

class Contract
{

    private int $id;
    private string $type;
    private float $montant;
    private int $duree;
    private int $id_client;

    public function getId(): int
    {
        return $this->id;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getMontant(): float
    {
        return $this->montant;
    }
    public function getDuree(): int
    {
        return $this->duree;
    }
    public function getIdClient(): int
    {
        return $this->id_client;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setType(string $type): void
    {
        $this->type = htmlspecialchars($type);
    }
    public function setMontant(float $montant): void
    {
        $this->montant = $montant;
    }
    public function setDuree(int $duree): void
    {
        $this->duree = $duree;
    }
    public function setIdClient(int $idClient): void
    {
        $this->id_client = $idClient;
    }

}