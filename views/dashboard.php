<?php require_once __DIR__ . '/templates/header.php'; ?>
        
<div class="container-fluid mb-5 bg-info pt-4 pb-2">
    <h2 class="mb-4 text-dark">Tableau de bord</h2>
</div>

<div>
    <div class="container-fluid mb-5 bg-light">
        <h4 class="mb-4 text-dark">Clients</h4>
    </div>

    <div class="container-fluid mb-3">

    </div>

    <a href="?action=client-list" class="btn btn-info mb-5">👤 Accèder au gestionnaire des clients</a>
</div>

<div>
    <div class="container-fluid mb-5 bg-light">
        <h4 class="mb-4 text-dark">Comptes bancaires</h4>
    </div>

    <div class="container-fluid mb-3">

    </div>

    <a href="?action=account-list" class="btn btn-info mb-5">🧾 Accèder au gestionnaire des comptes</a>
</div>

<div>
    <div class="container-fluid mb-5 bg-light">
        <h4 class="mb-4 text-dark">Contrats</h4>
    </div>

    <div class="container-fluid mb-3">

    </div>

    <a href="?action=account-list" class="btn btn-info mb-5">🖋 Accèder au gestionnaire des contrats</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php';