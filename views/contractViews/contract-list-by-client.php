<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid mb-5 bg-info pt-4 pb-2">
    <h2 class="mb-4 text-dark">🖋 Contrats souscrits</h2>
</div>

<table class="table table-striped mb-5">
    <thead class="table-info">
        <tr>
            <th scope="col">Identifiant du contrat</th>
            <th scope="col">Type de contrat</th>
            <th scope="col">Montant souscrit (en euros)</th>
            <th scope="col">Durée (en mois)</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($contracts as $contract): ?>

            <tr>
                <th scope="row"><?= $contract->getId(); ?></th>
                <td><?= $contract->getType(); ?></td>
                <td><?= $contract->getMontant(); ?></td>
                <td><?= $contract->getDuree(); ?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=client-list" class="btn btn-light mb-3">🔙 Retour à la liste des clients</a>

<?php require_once __DIR__ . '/../templates/footer.php';