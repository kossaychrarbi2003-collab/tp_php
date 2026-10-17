
<?php
require_once 'config.php';

$fichier = __DIR__ . '/data/notes.csv';

if (!file_exists($fichier)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

$handle = fopen($fichier, 'r');

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

$totalMoyennes = 0;
$nombreApprenants = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des apprenants</title>
</head>
<body>

<h1>Liste des apprenants</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
    </tr>

    <?php
    while (($ligne = fgetcsv($handle, 1000, ';')) !== false) {

        if (count($ligne) < 3) {
            continue;
        }

        $nom = $ligne[0];
        $noteInfo = (float) $ligne[1];
        $noteMath = (float) $ligne[2];

        $moyenne = ($noteInfo + $noteMath) / 2;

        if ($moyenne >= 16) {
            $mention = "Très bien";
        } elseif ($moyenne >= 14) {
            $mention = "Bien";
        } elseif ($moyenne >= 12) {
            $mention = "Assez bien";
        } elseif ($moyenne >= SEUIL) {
            $mention = "Passable";
        } else {
            $mention = "Ajourné";
        }

        $totalMoyennes += $moyenne;
        $nombreApprenants++;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . $noteInfo . "</td>";
        echo "<td>" . $noteMath . "</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>" . $mention . "</td>";
        echo "</tr>";
    }

    fclose($handle);
    ?>

</table>

<h2>Moyenne générale de la classe</h2>

<?php
if ($nombreApprenants > 0) {
    $moyenneGenerale = $totalMoyennes / $nombreApprenants;
    echo "<p>" . number_format($moyenneGenerale, 2) . "</p>";
} else {
    echo "<p>Aucun apprenant enregistré.</p>";
}
?>

</body>
</html>

<?php
echo "<h2>Lecture bas niveau avec fgets()</h2>";

$fichier = __DIR__ . '/data/notes.csv';
$handle = fopen($fichier, 'r');

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

while (!feof($handle)) {
    $ligne = fgets($handle);

    if ($ligne !== false) {
        $donnees = explode(';', trim($ligne));

        echo "<p>";
        print_r($donnees);
        echo "</p>";
    }
}

fclose($handle);
?>


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

Comparaison entre fgetcsv() et fgets() avec explode() :

- fgetcsv() lit et analyse directement une ligne CSV.
  Elle gère les séparateurs et les champs entre guillemets.

- fgets() lit une ligne comme une chaîne de caractères,
  puis explode() la découpe selon un séparateur.
  Cette méthode est simple, mais ne gère pas correctement
  toutes les règles du format CSV.

Conclusion :
fgetcsv() est préférable pour lire un véritable fichier CSV,
tandis que fgets() et explode() conviennent aux fichiers texte
simples avec un format fixe.
-->
