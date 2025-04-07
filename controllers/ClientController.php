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
        $client->setNom($_POST['client_name']);
        $client->setPrenom($_POST['client_surname']);
        $client->setEmail($_POST['client_mail']);
        $client->setTelephone($_POST['client_phone']);
        $client->setAdresse($_POST['client_location']);

        $this->clientRepository->addClient($client);

        header('Location ?client-list');

    }

    public function list()
    {
        $this->clientRepository->viewClients();

        require_once __DIR__ . '/../views/clientViews/client-list.php';
    }

    public function show(int $id)
    {
        $this->clientRepository->viewClient($id);

        require_once __DIR__ . '/../views/clientViews/client-show.php';
    }

    public function edit(int $id)
    {
        $this->clientRepository->viewClient($id);

        require_once __DIR__ . '/../views/clientViews/client-edit.php';
    }

    public function update()
    {
        $client = new Client();
        $client->setId($_POST['client_id']);
        $client->setNom($_POST['client_name']);
        $client->setPrenom($_POST['client_surname']);
        $client->setEmail($_POST['client_mail']);
        $client->setTelephone($_POST['client_phone']);
        $client->setAdresse($_POST['client_location']);

        $this->clientRepository->updateClient($client);

        header('Location ?client-show');
    }

    public function delete(int $id)
    {
        $this->clientRepository->deleteClient($id);

        header('Location ?client-list');
    }


}