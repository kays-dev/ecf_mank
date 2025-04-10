<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/repositories/ContractRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class ContractController
{
    private ClientRepository $clientRepository;
    private ContractRepository $contractRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
        $this->contractRepository = new ContractRepository();
    }

    public function create()
    {
        if (isConnected()) {
            $clients = $this->clientRepository->viewClients();

            require_once __DIR__ . '/../views/contractViews/contract-create.php';
            exit;
        }
    }

    public function set()
    {
        if (isConnected()) {
            $contract = new Contract();
            $contract->setType($_POST['type']);
            $contract->setMontant($_POST['sum']);
            $contract->setDuree($_POST['duration']);
            $contract->setIdClient($_POST['clientNum']);

            $this->contractRepository->addContract($contract);

            header('Location: ?action=contract-list');
            exit;
        }

    }

    public function list()
    {
        if (isConnected()) {
            $contracts = $this->contractRepository->viewContracts();

            require_once __DIR__ . '/../views/contractViews/contract-list.php';
            exit;
        }
    }

    public function listByClient(int $clientId)
    {
        if (isConnected()) {
            $contract = $this->contractRepository->viewContract($clientId);
            $contracts = $this->contractRepository->viewContractsByClient($clientId);

            require_once __DIR__ . '/../views/contractViews/contract-list-by-client.php';
                        
            exit;
        }
    }

    public function show(int $id)
    {
        if (isConnected()) {
            $contract = $this->contractRepository->viewContract($id);
            $client = $this->clientRepository->viewClient($contract->getIdClient());

            require_once __DIR__ . '/../views/contractViews/contract-show.php';
            exit;
        }
    }

    public function edit(int $id)
    {
        if (isConnected()) {
            $contract = $this->contractRepository->viewContract($id);

            require_once __DIR__ . '/../views/contractViews/contract-edit.php';
            exit;
        }
    }

    public function update()
    {
        if (isConnected()) {
            $contract = new Contract();
            $contract->setId($_POST['id']);
            $contract->setType($_POST['type']);
            $contract->setMontant($_POST['sum']);
            $contract->setDuree($_POST['duration']);
            $contract->setIdClient($_POST['clientNum']);

            $this->contractRepository->updateContract($contract);

            header('Location: ?action=contract-list');
            exit;
        }
    }

    public function delete(int $id)
    {
        if (isConnected()) {
            $this->contractRepository->deleteContract($id);

            header('Location: ?action=contract-list');
            exit;
        }
    }


}