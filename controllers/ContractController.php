<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/repositories/ContractRepository.php';

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
        $clients = $this->clientRepository->viewClients();

        require_once __DIR__ . '/../views/contractViews/contract-create.php';
    }

    public function set()
    {
        $contract = new Contract();
        $contract->setType($_POST['type']);
        $contract->setMontant($_POST['sum']);
        $contract->setDuree($_POST['duration']);
        $contract->setIdClient($_POST['clientNum']);

        $this->contractRepository->addContract($contract);

        header('Location: ?action=contract-list');

    }

    public function list()
    {
        $contracts= $this->contractRepository->viewContracts();

        require_once __DIR__ . '/../views/contractViews/contract-list.php';
    }

    public function show(int $id)
    {
        $contract = $this->contractRepository->viewContract($id);
        $client = $this->clientRepository->viewClient($contract->getIdClient());

        require_once __DIR__ . '/../views/contractViews/contract-show.php';
    }

    public function edit(int $id)
    {
        $contract = $this->contractRepository->viewContract($id);

        require_once __DIR__ . '/../views/contractViews/contract-edit.php';
    }

    public function update()
    {
        $contract = new Contract();
        $contract->setId($_POST['id']);
        $contract->setType($_POST['type']);
        $contract->setMontant($_POST['sum']);
        $contract->setDuree($_POST['duration']);
        $contract->setIdClient($_POST['clientNum']);

        $this->contractRepository->updateContract($contract);

        header('Location: ?action=contract-list');
    }

    public function delete(int $id)
    {
        $this->contractRepository->deleteContract($id);

        header('Location: ?action=contract-list');
    }


}