<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-2">
    <h2 class="mb-4 text-dark">👤 Liste des comptes</h2>
</div>

<table class="table table-striped mb-5">
    <thead class="table-info">
        <tr>
            <th scope="col">Identifiant du compte</th>
            <th scope="col">RIB</th>
            <th scope="col">Type de compte</th>
            <th scope="col">Solde</th>
            <th scope="col">Numéro du compte associé</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($accounts as $account): ?>

            <tr>
                <th scope="row"><?= $account->getId(); ?></th>
                <td><?= $account->getRib(); ?></td>
                <td><?= $account->getType(); ?></td>
                <td><?= $account->getSolde(); ?></td>
                <td><?= $account->getIdClient(); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="?action=account-edit&id=<?= $account->getId() ?>" class="btn btn-warning">✏️ Modifier</a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer le compte?');"
                            href="?action=account-delete&id=<?= $account->getId() ?>" class="btn btn-danger">✖ Supprimer</a>
                    </div>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=account-create" class="btn btn-info mb-3">➕ Nouveau compte</a>
<a href="?action=dashboard" class="btn btn-light mb-3">🔙 Retour au tableau de bord</a>

<?php require_once __DIR__ . '/../templates/footer.php';