<?php

session_start();

require_once __DIR__ . '/lib/utils.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/lib/utils.php';

$authControl = new AuthController();

require_once __DIR__ . '/controllers/ClientController.php';
require_once __DIR__ . '/controllers/AccountController.php';
require_once __DIR__ . '/controllers/ContractController.php';

$clientControl = new ClientController();
$accountControl = new AccountController();
$contractControl = new ContractController();

$action = $_GET['action'] ?? 'auth';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'auth':
        require_once __DIR__ . '/views/authViews/authentification.php';
        break;
    case 'auth-login':
        $authControl->login();
        break;
    case 'auth-logout':
        $authControl->logout();
        break;
    case 'dashboard':
        require_once __DIR__ . '/views/dashboard.php';
        break;
    case 'client-create':
        $clientControl->create();
        break;
    case 'account-create':
        $accountControl->create();
        break;
    case 'contract-create':
        $contractControl->create();
        break;
    case 'client-set':
        $clientControl->set();
        break;
    case 'account-set':
        $accountControl->set();
        break;
    case 'contract-set':
        $contractControl->set();
        break;
    case 'client-list':
        $clientControl->list();
        break;
    case 'account-list':
        $accountControl->list();
        break;
    case 'contract-list':
        $contractControl->list();
        break;
    case 'client-consult':
        $clientControl->show($id);
        break;
    case 'account-show':
        $accountControl->show($id);
        break;
    case 'contract-show':
        $contractControl->show($id);
        break;
    case 'client-edit':
        $clientControl->edit($id);
        break;
    case 'account-edit':
        $accountControl->edit($id);
        break;
    case 'contract-edit':
        $contractControl->edit($id);
        break;
    case 'client-update':
        $clientControl->update();
        break;
    case 'account-update':
        $accountControl->update();
        break;
    case 'contract-update':
        $contractControl->update();
        break;
    case 'client-delete':
        $clientControl->delete($id);
        break;
    case 'account-delete':
        $accountControl->delete($id);
        break;
    case 'contract-delete':
        $contractControl->delete($id);
        break;
    case '406':
        require_once __DIR__ . '/views/authViews/406.php';
        break;
    case '401':
        require_once __DIR__ . '/views/authViews/401.php';
        break;
    default:
        require_once __DIR__ . '/views/404.php';
        break;
}