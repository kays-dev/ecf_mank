<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="d-flex flex-column" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg p-2"  style="background-color:rgb(102, 16, 242)" data-bs-theme="dark">
        <div class="justify-content-left">
            <a class="navbar-brand fs-1" href="?action=dashboard">🏧 M A N K 🏧</a>
        </div>
        <div class="m-5"></div>
        <div class="justify-content-right">
        <?php if(isConnected()): ?>
            <a class="navbar-brand fs-1" href="?action=auth-logout">Déconnexion</a>
        <?php endif; ?>
        </div>


    </nav>

    <ul class="nav nav-tabs nav-fill text-secondary mx-5 my-5">
        <li class="nav-item" >
            <a class="nav-link list-group-item-action border-info-subtle link-body-emphasis link-offset-2" style="background-color:rgb(102, 16, 242,0.7)" href="?action=dashboard">Tableau de bord</a>
        </li>

        <li class="nav-item">
            <a class="nav-link list-group-item-action border-info-subtle link-body-emphasis link-offset-2" href="?action=client-list" style="background-color:rgb(102, 16, 242,0.2)">Gestion des clients</a>
        </li>

        <li class="nav-item">
            <a class="nav-link list-group-item-action border-info-subtle link-body-emphasis link-offset-2" style="background-color:rgb(102, 16, 242,0.2)" href="?action=account-list">Gestion des comptes bancaires</a>
        </li>

        <li class="nav-item">
            <a class="nav-link list-group-item-action border-info-subtle link-body-emphasis link-offset-2" href="?action=contract-list" style="background-color:rgb(102, 16, 242,0.2);">Gestion des contrats</a>
        </li>

    </ul>

    <div class="tab-content mx-5 my-5 px-3 py-3 border border-top-0 border-info-subtle rounded-5 rounded-top-0">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel">
