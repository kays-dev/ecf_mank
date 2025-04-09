<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-4 text-dark">📋 Détails du contrat</h2>
</div>

<div class="container-fluid mb-5 bg-light pt-4 pb-4">
    <h4 class="mb-2 text-dark">Compte n° <?= $contract->getId(); ?> </h4>
</div>

<p><strong>Type de contrat : </strong> <?= $contract->getType() ?></p>
<p><strong>Montant souscrit : </strong> <?= $contract->getMontant() ?></p>
<p><strong>Durée : </strong> <?= $contract->getMontant() ?></p>
<p><strong>Client associé : </strong><?= $client->getNom(); ?> <?= $client->getPrenom(); ?></p>

<a href="?action=contract-edit&id=<?= $contract->getId() ?>" class="btn btn-info mb-3">✏️ Modifier les détails du contrat</a>
<a href="?action=contract-list" class="btn btn-light mb-3">🔙 Retour à la liste des contrats</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 