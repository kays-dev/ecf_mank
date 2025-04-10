<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-2">
    <h2 class="mb-4 text-dark">👤 Liste des clients</h2>
</div>

<table class="table table-striped mb-5">
    <thead class="table-info">
        <tr>
            <th scope="col">Numéro client</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Adresse</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($clients as $client): ?>

            <tr>
                <th scope="row"><?= $client->getId(); ?></th>
                <td><?= $client->getNom(); ?></td>
                <td><?= $client->getPrenom(); ?></td>
                <td><?= $client->getEmail(); ?></td>
                <td><?= $client->getTelephone(); ?></td>
                <td><?= $client->getAdresse(); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="?action=client-show&id=<?= $client->getId() ?>" class="btn btn-light">👁‍🗨 Consulter</a>
                        <a href="?action=client-edit&id=<?= $client->getId() ?>" class="btn btn-warning">✏️ Modifier</a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer le client ?');"
                            href="?action=client-delete&id=<?= $client->getId() ?>" class="btn btn-danger">✖ Supprimer</a>
                    </div>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=client-create" class="btn btn-info mb-3">➕ Nouveau client</a>
<a href="?action=dashboard" class="btn btn-light mb-3">🔙 Retour au tableau de bord</a>

<?php require_once __DIR__ . '/../templates/footer.php';