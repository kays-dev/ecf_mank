<?php 

require_once __DIR__ . '/../lib/database.php';

class Admin{

    private int $id;
    private string $email;
    private string $motdepasse;

    public function getId(): int{
        return $this->id;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getMotDePasse(){
        return $this->motdepasse;
    }


    public function setId(int $id): void{
        $this->id=$id;
    }
    public function setEmail(string $email): void{
        $this->email=$email;
    }
    public function setMotDePasse(string $motdepasse){
        $this->motdepasse=$motdepasse;
    }

}