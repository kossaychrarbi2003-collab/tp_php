
<?php
// Auteur : Votre nom
// Objectif : Connexion avec session et cookie
// Date : 17/10/2026

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');

    if ($login === '') {
        $erreur = "Veuillez saisir votre login.";
    } else {
        $_SESSION['login'] = $login;

        // Cookie valable pendant 24 heures
        setcookie("dernier_login", $login, time() + 86400, "/");
        $infosConnexion = [
    'login' => $login,
    'date' => date('d/m/Y H:i:s')
];

setcookie(
    'infos_connexion',
    json_encode($infosConnexion),
    time() + 86400,
    '/'
);

        header("Location: profil.php");
        exit;
    }
}

$loginPrecedent = $_COOKIE['dernier_login'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php if (isset($erreur)): ?>
        <p><?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="login">Votre login :</label>

        <input
            type="text"
            id="login"
            name="login"
            value="<?= htmlspecialchars($loginPrecedent, ENT_QUOTES, 'UTF-8') ?>"
            required
        >

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

1. Où est stockée une session ? Où est stocké un cookie ?

Une session est principalement stockée côté serveur. Le navigateur
conserve généralement un identifiant de session permettant de retrouver
les données de cette session.

Un cookie est stocké côté client, dans le navigateur de l'utilisateur.

2. Pourquoi setcookie() et header() doivent-ils être appelés
avant tout affichage ?

Ces fonctions envoient des en-têtes HTTP au navigateur.
Les en-têtes doivent être envoyés avant le contenu HTML ou tout autre
affichage. Sinon, PHP peut produire l'erreur « Headers already sent ».
