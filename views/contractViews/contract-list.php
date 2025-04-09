<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-2">
    <h2 class="mb-4 text-dark">🖋 Liste des contrats</h2>
</div>

<table class="table table-striped mb-5">
    <thead class="table-info">
        <tr>
            <th scope="col">Identifiant du contrat</th>
            <th scope="col">Type de contrat</th>
            <th scope="col">Montant souscrit (en euros)</th>
            <th scope="col">Durée (en mois)</th>
            <th scope="col">Numéro du compte associé</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($contracts as $contract): ?>

            <tr>
                <th scope="row"><?= $contract->getId(); ?></th>
                <!-- toInner():fonction js pour avoir le inner et pas la value  -->
                <td><?= $contract->getType(); ?></td>
                <td><?= $contract->getMontant(); ?></td>
                <td><?= $contract->getDuree(); ?></td>
                <td><?= $contract->getIdClient(); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="?action=contract-edit&id=<?= $contract->getId() ?>" class="btn btn-warning">✏️ Modifier</a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer le contrat?');"
                            href="?action=contract-delete&id=<?= $contract->getId() ?>" class="btn btn-danger">✖ Supprimer</a>
                    </div>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=contract-create" class="btn btn-info mb-3">➕ Nouveau contrat</a>
<a href="?action=dashboard" class="btn btn-light mb-3">🔙 Retour au tableau de bord</a>

<?php require_once __DIR__ . '/../templates/footer.php';