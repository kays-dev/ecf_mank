<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-2 text-dark">➕ Créer un nouveau compte</h2>
</div>

<form action="?action=account-set" method="POST">

    <div class="mb-3">
        <label for="rib" class="form-label text-body-emphasis">RIB :</label>
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" id="rib" name="rib" >
    </div>

    <div class="mb-3">
        <label for="type" class="form-label text-body-emphasis">Type de compte :</label>
        <select class="form-control" name="type" id="type" required>
            <option value="selection" selected>Veuillez sélectionner une option</option>
            <option value="courant">Compte courant</option>
            <option value="épargne">Compte épargne</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="balance" class="form-label text-body-emphasis">Solde initial :</label>
        <input type="number" min="0.000" step="0.001" class="form-control border-info-subtle bg-light-subtle currency-euro" id="balance" name="balance" required>
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

    <button type="submit" class="btn btn-info mb-3">Ajouter</button>
    <a href="?action=account-list" class="btn btn-light mb-3">🔙 Retour à la liste des comptes</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php';