
<?php
// Auteur : Votre nom
// Objectif : Calculer une durée et vérifier une date
// Date : 17/10/2026

date_default_timezone_set('Africa/Casablanca');

$aujourdhui = new DateTime('today');
$finSemestre = new DateTime('2027-01-31');

$difference = $aujourdhui->diff($finSemestre);
$joursRestants = (int) $difference->format('%r%a');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des dates</title>
</head>
<body>

<h1>Gestion des dates</h1>

<h2>1. Nombre de jours restants</h2>

<p>
    Date de fin du semestre :
    <?= $finSemestre->format('d/m/Y') ?>
</p>

<p>
    <?php
    if ($joursRestants > 0) {
        echo "Il reste $joursRestants jours avant la fin du semestre.";
    } elseif ($joursRestants === 0) {
        echo "C'est aujourd'hui la fin du semestre.";
    } else {
        echo "La date de fin du semestre est déjà passée.";
    }
    ?>
</p>

<h2>2. Vérification d'une date</h2>

<form method="POST" action="dates.php">
    <label>Jour :</label>
    <input type="number" name="jour" min="1" max="31" required>

    <label>Mois :</label>
    <input type="number" name="mois" min="1" max="12" required>

    <label>Année :</label>
    <input type="number" name="annee" min="1" required>

    <button type="submit">Vérifier</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jour = filter_input(INPUT_POST, 'jour', FILTER_VALIDATE_INT);
    $mois = filter_input(INPUT_POST, 'mois', FILTER_VALIDATE_INT);
    $annee = filter_input(INPUT_POST, 'annee', FILTER_VALIDATE_INT);

    if (
        $jour !== false && $jour !== null &&
        $mois !== false && $mois !== null &&
        $annee !== false && $annee !== null &&
        checkdate($mois, $jour, $annee)
    ) {
        echo "<p>Date valide : " .
             sprintf('%02d/%02d/%04d', $jour, $mois, $annee) .
             "</p>";
    } else {
        echo "<p>Date invalide.</p>";
    }
}
?>

</body>
</html>
