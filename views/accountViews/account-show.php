<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-4 text-dark">📋 Détails du compte</h2>
</div>

<div class="container-fluid mb-5 bg-light pt-4 pb-4">
    <h4 class="mb-2 text-dark">Compte n° <?= $account->getId(); ?> </h4>
</div>

<p><strong>RIB : </strong> <?= $account->getRib() ?></p>
<p><strong>Type de compte : </strong> <?= $account->getType() ?></p>
<p><strong>Solde : </strong> <?= $account->getSolde() ?></p>
<p><strong>Client associé : </strong><?= $client->getNom(); ?> <?= $client->getPrenom(); ?></p>

<a href="?action=account-edit&id=<?= $account->getId() ?>" class="btn btn-info mb-3">✏️ Modifier les détails du compte</a>
<a href="?action=account-list" class="btn btn-light mb-3">🔙 Retour à la liste des comptes</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 