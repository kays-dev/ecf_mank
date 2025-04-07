<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-2 text-dark">✏️ Modifier les détails du client</h2>
</div>

<form action="?action=client-update" method="POST">

    <div class="mb-3">
        <label for="name" class="form-label text-body-emphasis">Nom :</label>
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" id="name" name="name" value="<?= $client->getNom() ?>" required>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label text-body-emphasis">Prénom :</label>
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" id="surname" name="surname" value="<?= $client->getPrenom() ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label text-body-emphasis">Adresse mail :</label>
        <input type="text" class="form-control border-info-subtle bg-light-subtle" id="email" name="email" value="<?= $client->getEmail() ?>" required>
    </div>

    <div class="mb-5">
        <label for="phone" class="form-label text-body-emphasis">Numéro de téléphone :</label>
        <input type="text" class="form-control border-info-subtle bg-light-subtle" id="phone" name="phone" value="<?= $client->getTelephone() ?>" required>
    </div>

    <div class="mb-5">
        <label for="location" class="form-label text-body-emphasis">Adresse :</label>
        <input type="text" class="form-control border-info-subtle bg-light-subtle" id="location" name="location" value="<?= $client->getAdresse() ?>">
    </div>

    <button type="submit" class="btn btn-info mb-3">Modifier</button>
    <a href="?action=client-list" class="btn btn-light mb-3">🔙 Retour à la liste des clients</a>
</form>

<?php require_once __DIR__ . '/../templates/footer.php';