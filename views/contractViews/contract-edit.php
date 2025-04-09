<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-1 text-dark">✏️ Modifier les détails du contrat</h2>
</div>

<div class="container-fluid mb-5 bg-light pt-4 pb-4">
    <h4 class="mb-2 text-dark">Contrat n° <?= $contrat->getId(); ?> </h4>
</div>

<form action="?action=contract-update" method="POST">
    <input type="hidden" name="id" value="<?= $contract->getId() ?>" readonly>

    <div class="mb-3">
    <?php $type = $account->getType(); ?>

        <label for="type" class="form-label text-body-emphasis">Type de contrat :</label>
        <select class="form-control" name="type" id="type" readonly>
            <option <?= $type == 'assvie' ? 'selected' : 'Veuillez sélectionner une option' ?> value="assvie">Assurance vie</option>
            <option <?= $type == 'asshab' ? 'selected' : 'Veuillez sélectionner une option' ?> value="asshab">Assurance habitation</option>
            <option <?= $type == 'credimmo' ? 'selected' : 'Veuillez sélectionner une option' ?> value="credimmo">Crédit Immobilier</option>
            <option <?= $type == 'credcons' ? 'selected' : 'Veuillez sélectionner une option' ?> value="credcons">Crédit à la consommation</option>
            <option <?= $type == 'cel' ? 'selected' : 'Veuillez sélectionner une option' ?> value="cel">Compte Épargne Logement (CEL)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="sum" class="form-label text-body-emphasis">Montant souscrit :</label>        
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" min="0" step="0.001" id="sum" name="sum" value="<?= $contract->getMontant() ?>">
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label text-body-emphasis">Durée :</label>
        <input type="number" class="form-control border-info-subtle bg-light-subtle currency-euro" id="duration" name="duration" value="<?= $contract->getDuree() ?>">
    </div>

    <div class="mb-5">
        <label for="clientNum" class="form-label text-body-emphasis">Numéro client associé :</label>
        <input type="text" class="form-control border-info-subtle bg-light-subtle currency-euro" id="clientNum" name="clientNum" value="<?= $contract->getIdClient() ?>" readonly>
    </div>

    <button type="submit" class="btn btn-info mb-3">Modifier</button>
    <a href="?action=contract-list" class="btn btn-light mb-3">🔙 Retour à la liste des contrats</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php';