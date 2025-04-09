<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class ClientController
{
    private ClientRepository $clientRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
    }

    public function create()
    {
        if (isConnected()) {
            require_once __DIR__ . '/../views/clientViews/client-create.php';
            exit;
        }
    }

    public function set()
    {
        if (isConnected()) {
            $client = new Client();
            $client->setNom($_POST['name']);
            $client->setPrenom($_POST['surname']);
            $client->setEmail($_POST['email']);
            $client->setTelephone($_POST['phone']);
            $client->setAdresse($_POST['location']);

            $this->clientRepository->addClient($client);

            header('Location: ?action=client-list');
            exit;
        }

    }

    public function list()
    {
        if (isConnected()) {
            $clients = $this->clientRepository->viewClients();

            require_once __DIR__ . '/../views/clientViews/client-list.php';
            exit;
        }
    }

    public function show(int $id)
    {
        if (isConnected()) {
            $client = $this->clientRepository->viewClient($id);

            require_once __DIR__ . '/../views/clientViews/client-show.php';
            exit;
        }
    }

    public function edit(int $id)
    {
        if (isConnected()) {
            $client = $this->clientRepository->viewClient($id);

            require_once __DIR__ . '/../views/clientViews/client-edit.php';
            exit;
        }
    }

    public function update()
    {
        if (isConnected()) {
            $client = new Client();
            $client->setId($_POST['id']);
            $client->setNom($_POST['name']);
            $client->setPrenom($_POST['surname']);
            $client->setEmail($_POST['email']);
            $client->setTelephone($_POST['phone']);
            $client->setAdresse($_POST['location']);

            $this->clientRepository->updateClient($client);

            header('Location: ?action=client-list');
            exit;
        }
    }

    public function delete(int $id)
    {
        if (isConnected()) {
            $this->clientRepository->deleteClient($id);

            header('Location: ?action=client-list');
            exit;
        }
    }


}