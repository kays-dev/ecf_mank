<?php require_once __DIR__ . '/../authViews/header.php'; ?>

<div class="container-fluid px-3 py-3 mb-5 bg-info pt-4 pb-4">
    <h2 class="mb-2 text-dark">Connexion</h2>
</div>

<form class="px-5 py-5" action="?action=auth-login" method="POST">

    <div class="mb-3">
        <label for="email" class="form-label text-body-emphasis">Adresse mail :</label>
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" id="email" name="email"
            required>
    </div>

    <div class="mb-5">
        <label for="password" class="form-label text-body-emphasis">Mot de passe :</label>
        <input type="text" class="form-control border border-info-subtle bg-light-subtle" id="password" name="password"
            required>
    </div>

    <button type="submit" class="btn btn-info mb-3">Se connecter</button>
</form>

<?php require_once __DIR__ . '/../authViews/footer.php'; 