<?php
require_once 'config.php';

if (
    !isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) ||
    trim($_POST['nom']) === '' ||
    trim((string) $_POST['note_info']) === '' ||
    trim((string) $_POST['note_math']) === ''
) {
    exit("Erreur : veuillez remplir tous les champs.");
}

$nom = trim($_POST['nom']);
$noteInfo = $_POST['note_info'];
$noteMath = $_POST['note_math'];

if (
    !is_numeric($noteInfo) ||
    !is_numeric($noteMath) ||
    $noteInfo < NOTE_MIN || $noteInfo > NOTE_MAX ||
    $noteMath < NOTE_MIN || $noteMath > NOTE_MAX
) {
    exit("Erreur : les notes doivent être comprises entre 0 et 20.");
}

$fichier = fopen(__DIR__ . '/data/notes.csv', 'a');

if ($fichier === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

fputcsv($fichier, [$nom, $noteInfo, $noteMath], ';');

fclose($fichier);

$nomSecurise = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');

echo "<h1>Récapitulatif</h1>";
echo "<p>Nom : $nomSecurise</p>";
echo "<p>Note en informatique : " .
     htmlspecialchars((string) $noteInfo, ENT_QUOTES, 'UTF-8') .
     "</p>";
echo "<p>Note en mathématiques : " .
     htmlspecialchars((string) $noteMath, ENT_QUOTES, 'UTF-8') .
     "</p>";
?>
/*
Question : Pourquoi préférer POST à GET pour un mot de passe ?

Réponse :
On préfère POST car les données ne sont pas affichées directement
dans l'URL. Cependant, HTTPS est nécessaire pour sécuriser
la transmission du mot de passe.
*/
/*
Question : Que contient $_REQUEST ?

Réponse :
$_REQUEST peut contenir les données de GET, POST et COOKIE,
selon la configuration de PHP.
*/