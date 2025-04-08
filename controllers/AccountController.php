<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/repositories/AccountRepository.php';

class AccountController
{
    private ClientRepository $clientRepository;
    private AccountRepository $accountRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
        $this->accountRepository = new AccountRepository();
    }

    public function create()
    {
        $clients = $this->clientRepository->viewClients();

        require_once __DIR__ . '/../views/accountViews/account-create.php';
    }

    public function set()
    {
        $account = new Account();
        $account->setRib($_POST['rib']);
        $account->setType($_POST['type']);
        $account->setSolde($_POST['balance']);
        $account->setIdClient($_POST['clientNum']);

        $this->accountRepository->addAccount($account);

        header('Location: ?action=account-list');

    }

    public function list()
    {
        $accounts= $this->accountRepository->viewAccounts();

        require_once __DIR__ . '/../views/accountViews/account-list.php';
    }

    public function show(int $id)
    {
        $account = $this->accountRepository->viewAccount($id);
        $client = $this->clientRepository->viewClient($account->getIdClient());

        require_once __DIR__ . '/../views/accountViews/account-show.php';
    }

    public function edit(int $id)
    {
        $account = $this->accountRepository->viewAccount($id);

        require_once __DIR__ . '/../views/accountViews/account-edit.php';
    }

    public function update()
    {
        $account = new Account();
        $account->setId($_POST['id']);
        $account->setRib($_POST['rib']);
        $account->setType($_POST['type']);
        $account->setSolde($_POST['balance']);
        $account->setIdClient($_POST['clientNum']);

        $this->accountRepository->updateAccount($account);

        header('Location: ?action=account-list');
    }

    public function delete(int $id)
    {
        $this->accountRepository->deleteAccount($id);

        header('Location: ?action=account-list');
    }


}