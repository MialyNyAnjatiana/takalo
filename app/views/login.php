<?php
$errors = $errors ?? [];
$values = $values ?? [];

function e($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
function cls_invalid($errors, $field){
    return !empty($errors[$field]) ? 'is-invalid' : '';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"/>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"/>

<link rel="stylesheet" href="../css/adminlte.css" />
</head>

<body class="login-page bg-body-secondary">

<div class="login-box">
<div class="login-logo">
<a href="#"><b>Exchange</b>App</a>
</div>

<div class="card">
<div class="card-body login-card-body">

<p class="login-box-msg">Connexion</p>

<form action="/login" method="post">

    <!-- EMAIL -->
    <div class="input-group mb-2">
        <input
            type="email"
            name="email"
            class="form-control <?= cls_invalid($errors, 'email') ?>"
            placeholder="Email"
            value="<?= e($values['email'] ?? '') ?>"
        />
        <div class="input-group-text">
            <span class="bi bi-envelope"></span>
        </div>
    </div>
    <?php if (!empty($errors['email'])): ?>
        <div class="text-danger small mb-2">
            <?= e($errors['email']) ?>
        </div>
    <?php endif; ?>

    <!-- NOM -->
    <div class="input-group mb-2">
        <input
            type="text"
            name="nom"
            class="form-control <?= cls_invalid($errors, 'nom') ?>"
            placeholder="Nom"
            value="<?= e($values['nom'] ?? '') ?>"
        />
        <div class="input-group-text">
            <span class="bi bi-person"></span>
        </div>
    </div>
    <?php if (!empty($errors['nom'])): ?>
        <div class="text-danger small mb-2">
            <?= e($errors['nom']) ?>
        </div>
    <?php endif; ?>

    <!-- MOT DE PASSE -->
    <div class="input-group mb-3">
        <input
            type="password"
            name="mdp"
            class="form-control <?= cls_invalid($errors, 'mdp') ?>"
            placeholder="Mot de passe"
        />
        <div class="input-group-text">
            <span class="bi bi-lock"></span>
        </div>
    </div>
    <?php if (!empty($errors['mdp'])): ?>
        <div class="text-danger small mb-3">
            <?= e($errors['mdp']) ?>
        </div>
    <?php endif; ?>

    <!-- SUBMIT -->
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">
                Se connecter
            </button>
        </div>
    </div>

</form>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
<script src="../js/adminlte.js"></script>

</body>
</html>
