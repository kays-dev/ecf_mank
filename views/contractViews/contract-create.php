<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-2 text-dark">➕ Créer un nouveau contrat</h2>
</div>

<form action="?action=contract-set" method="POST">

    <div class="mb-3">
        <label for="type" class="form-label text-body-emphasis">Type de contrat :</label>
        <select class="form-control" name="type" id="type" required>
            <option value="selection" selected>Veuillez sélectionner une option</option>
            <option value="assvie">Assurance vie</option>
            <option value="asshab"> Assurance habitation</option>
            <option value="credimmo">Crédit Immobilier</option>
            <option value="credcons">Crédit à la consommation</option>
            <option value="cel">Compte Épargne Logement (CEL)</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="sum" class="form-label text-body-emphasis">Montant souscrit :</label>
        <input type="number" min="0.000" step="0.001" class="form-control border-info-subtle bg-light-subtle currency-euro" id="sum" name="sum" required>

    </div>

    <div class="mb-3">
        <label for="duration" class="form-label text-body-emphasis">Durée :</label>
        <input type="number" min="1" max="12" step="1" class="form-control border-info-subtle bg-light-subtle currency-euro" id="duration" name="duration" required>
    </div>

    <div class="mb-3">
        <label for="clientNum" class="form-label text-body-emphasis">Numéro client associé :</label>
        <select name="clientNum" id="clientNum">
            <option value="-">— Sélectionnez le client associé —</option>
        <?php foreach($clients as $client) :?>
            <option value="<?= $client->getId() ?>"> 
                Client n° <?= $client->getId(); ?> — <?= $client->getNom(); ?>  <?= $client->getPrenom(); ?>
            </option>
        <?php endforeach ?>
        </select>
    </div>

    <button sum="submit" class="btn btn-info mb-3">Ajouter</button>
    <a href="?action=contract-list" class="btn btn-light mb-3">🔙 Retour à la liste des contrats</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php';