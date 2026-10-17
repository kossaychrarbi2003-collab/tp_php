<?php
$nom = htmlspecialchars($_GET['nom'] ?? '', ENT_QUOTES, 'UTF-8');
$prenom = htmlspecialchars($_GET['prenom'] ?? '', ENT_QUOTES, 'UTF-8');
$sexe = $_GET['sexe'] ?? '';

if ($nom === '' || $prenom === '') {
    exit("Veuillez saisir le nom et le prénom.");
}

if ($sexe === 'M') {
    $salutation = "Bonjour Monsieur";
} elseif ($sexe === 'F') {
    $salutation = "Bonjour Madame";
} else {
    exit("Veuillez choisir un sexe valide.");
}

echo $salutation . " " . $prenom . " " . $nom;
?>
