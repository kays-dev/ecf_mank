<?php

require_once __DIR__ . '/../lib/database.php';

class Client {

    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
    private string $adresse;

    public function getId(): int{
        return $this->id;
    }
    public function getNom(): string{
        return $this->nom;
    }
    public function getPrenom(): string{
        return $this->prenom;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getTelephone(): string{
        return $this->telephone;
    }
    public function getAdresse(): string{
        return $this->adresse;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }
    public function setNom(string $nom): void{
        $this->nom = htmlspecialchars($nom);
    }
    public function setPrenom(string $prenom): void{
        $this->prenom = htmlspecialchars($prenom);
    }
    public function setEmail(string $email): void{
        $this->email = htmlspecialchars($email);
    }
    public function setTelephone(string $telephone): void{
        $this->telephone = htmlspecialchars($telephone);
    }
    public function setAdresse(string $adresse): void{
        $this->adresse = htmlspecialchars($adresse);
    }
}