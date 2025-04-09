<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-1 text-dark">✏️ Modifier les détails du compte</h2>
</div>

<div class="container-fluid mb-5 bg-light pt-4 pb-4">
    <h4 class="mb-2 text-dark">Compte n° <?= $account->getId(); ?> </h4>
</div>

<form action="?action=account-update" method="POST">
    <input type="hidden" name="id" value="<?= $account->getId() ?>" readonly>

    <div class="mb-3">
        <label for="rib" class="form-label text-body-emphasis">RIB :</label>
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" id="rib" name="rib" value="<?= $account->getRib() ?>" readonly>
    </div>

    <div class="mb-3">
        <?php $type = $account->getType(); ?>

        <label for="type" class="form-label text-body-emphasis">Type de compte :</label>
        <select class="form-control" name="type" id="type">
            <option <?= $type == 'courant' ? 'selected' : 'Veuillez sélectionner une option' ?> value="courant">Compte courant</option>
            <option <?= $type == 'épargne' ? 'selected' : 'Veuillez sélectionner une option' ?> value="épargne">Compte épargne</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="balance" class="form-label text-body-emphasis">Solde :</label>
        <input type="number" class="form-control border-info-subtle bg-light-subtle currency-euro" min="0" step="0.001" id="balance" name="balance" value="<?= $account->getSolde() ?>">
    </div>

    <div class="mb-5">
        <label for="clientNum" class="form-label text-body-emphasis">Numéro client associé :</label>
        <input type="text" class="form-control border-info-subtle bg-light-subtle currency-euro" id="clientNum" name="clientNum" value="<?= $account->getIdClient() ?>" readonly>
    </div>

    <button type="submit" class="btn btn-info mb-3">Modifier</button>
    <a href="?action=account-list" class="btn btn-light mb-3">🔙 Retour à la liste des clients</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php';