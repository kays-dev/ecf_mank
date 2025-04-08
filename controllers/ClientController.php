<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';

class ClientController
{
    private ClientRepository $clientRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
    }

    public function create()
    {
        require_once __DIR__ . '/../views/clientViews/client-create.php';
    }

    public function set()
    {
        $client = new Client();
        $client->setNom($_POST['name']);
        $client->setPrenom($_POST['surname']);
        $client->setEmail($_POST['email']);
        $client->setTelephone($_POST['phone']);
        $client->setAdresse($_POST['location']);

        $this->clientRepository->addClient($client);

        header('Location: ?action=client-list');

    }

    public function list()
    {
        $clients= $this->clientRepository->viewClients();

        require_once __DIR__ . '/../views/clientViews/client-list.php';
    }

    public function show(int $id)
    {
        $client = $this->clientRepository->viewClient($id);

        require_once __DIR__ . '/../views/clientViews/client-show.php';
    }

    public function edit(int $id)
    {
        $client = $this->clientRepository->viewClient($id);

        require_once __DIR__ . '/../views/clientViews/client-edit.php';
    }

    public function update()
    {
        $client = new Client();
        $client->setId($_POST['id']);
        $client->setNom($_POST['name']);
        $client->setPrenom($_POST['surname']);
        $client->setEmail($_POST['email']);
        $client->setTelephone($_POST['phone']);
        $client->setAdresse($_POST['location']);

        $this->clientRepository->updateClient($client);

        header('Location: ?action=client-list');
    }

    public function delete(int $id)
    {
        $this->clientRepository->deleteClient($id);

        header('Location: ?action=client-list');
    }


}