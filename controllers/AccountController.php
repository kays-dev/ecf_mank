<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/repositories/AccountRepository.php';
require_once __DIR__ . '/../lib/utils.php';

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
        if (isConnected()) {
            $clients = $this->clientRepository->viewClients();

            require_once __DIR__ . '/../views/accountViews/account-create.php';

            exit;
        }
    }

    public function set()
    {
        if (isConnected()) {
            $account = new Account();
            $account->setRib($_POST['rib']);
            $account->setType($_POST['type']);
            $account->setSolde($_POST['balance']);
            $account->setIdClient($_POST['clientNum']);

            $this->accountRepository->addAccount($account);

            header('Location: ?action=account-list');
                        
            exit;
        }

    }

    public function list()
    {
        if (isConnected()) {
            $accounts = $this->accountRepository->viewAccounts();

            require_once __DIR__ . '/../views/accountViews/account-list.php';
                        
            exit;
        }
    }

    public function show(int $id)
    {
        if (isConnected()) {
            $account = $this->accountRepository->viewAccount($id);
            $client = $this->clientRepository->viewClient($account->getIdClient());

            require_once __DIR__ . '/../views/accountViews/account-show.php';
                        
            exit;
        }
    }

    public function edit(int $id)
    {
        if (isConnected()) {
            $account = $this->accountRepository->viewAccount($id);

            require_once __DIR__ . '/../views/accountViews/account-edit.php';
                        
            exit;
        }
    }

    public function update()
    {
        if (isConnected()) {
            $account = new Account();
            $account->setId($_POST['id']);
            $account->setRib($_POST['rib']);
            $account->setType($_POST['type']);
            $account->setSolde($_POST['balance']);
            $account->setIdClient($_POST['clientNum']);

            $this->accountRepository->updateAccount($account);

            header('Location: ?action=account-list');
                        
            exit;
        }
    }

    public function delete(int $id)
    {
        if (isConnected()) {
            $this->accountRepository->deleteAccount($id);

            header('Location: ?action=account-list');
                        
            exit;
        }
    }


}