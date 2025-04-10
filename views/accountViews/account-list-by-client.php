<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-2">
    <h2 class="mb-4 text-dark">🧾 Comptes ouverts </h2>
</div>

<table class="table table-striped mb-5">
    <thead class="table-info">
        <tr>
            <th scope="col">Identifiant du compte</th>
            <th scope="col">RIB</th>
            <th scope="col">Type de compte</th>
            <th scope="col">Solde</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($accounts as $account): ?>

            <tr>
                <th scope="row"><?= $account->getId(); ?></th>
                <td><?= $account->getRib(); ?></td>
                <td><?= $account->getType(); ?></td>
                <td><?= $account->getSolde(); ?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=client-list" class="btn btn-light mb-3">🔙 Retour à la liste des clients</a>

<?php require_once __DIR__ . '/../templates/footer.php';