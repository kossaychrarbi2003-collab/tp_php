
<?php
require_once 'config.php';

$fichierCSV = __DIR__ . '/data/notes.csv';
$fichierJSON = __DIR__ . '/data/notes.json';

if (!file_exists($fichierCSV)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

$handle = fopen($fichierCSV, 'r');

if ($handle === false) {
    exit("Erreur : impossible d'ouvrir le fichier CSV.");
}

$resultats = [];

while (($ligne = fgetcsv($handle, 1000, ';')) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    $nom = $ligne[0];
    $noteInfo = (float) $ligne[1];
    $noteMath = (float) $ligne[2];
    $moyenne = ($noteInfo + $noteMath) / 2;

    $resultats[] = [
        'nom' => $nom,
        'note_info' => $noteInfo,
        'note_math' => $noteMath,
        'moyenne' => $moyenne
    ];
}

fclose($handle);

// 1. Conversion du tableau en JSON
$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

// 2. Écriture dans le fichier JSON
if ($json === false ||
    file_put_contents($fichierJSON, $json) === false) {
    exit("Erreur : impossible d'écrire le fichier JSON.");
}

// 3. Lecture du fichier JSON
$jsonLu = file_get_contents($fichierJSON);

if ($jsonLu === false) {
    exit("Erreur : impossible de lire le fichier JSON.");
}

// 4. Conversion du JSON en tableau PHP
$resultatsLus = json_decode($jsonLu, true);

echo "<h1>Résultats des apprenants</h1>";

echo "<h2>Contenu du fichier JSON</h2>";
echo "<pre>";
print_r($resultatsLus);
echo "</pre>";

// 5. Comparaison avec serialize()
$serialise = serialize($resultats);

echo "<h2>Résultat de serialize()</h2>";
echo "<pre>";
echo htmlspecialchars($serialise, ENT_QUOTES, 'UTF-8');
echo "</pre>";

echo "<h2>Résultat de json_encode()</h2>";
echo "<pre>";
echo htmlspecialchars($json, ENT_QUOTES, 'UTF-8');
echo "</pre>";
?>
/*### Exercice 5.4 — Comparaison entre `serialize()` et `json_encode()`
**1. `serialize()` :**
La fonction `serialize()` transforme une valeur PHP en une chaîne de caractères qui peut être reconstruite en PHP avec `unserialize()`.
**2. `json_encode()` :**
La fonction `json_encode()` transforme un tableau PHP en une chaîne au format JSON. La fonction `json_decode()` permet de convertir cette chaîne en valeur PHP.
**3. Différence entre les deux formats :**
- `serialize()` est principalement destiné à sauvegarder et à restaurer des données PHP.
- `json_encode()` produit un format standard, lisible et largement compatible avec différents langages.
**4. Quel format est directement exploitable par JavaScript ?**
Le format **JSON** est directement exploitable par JavaScript grâce à `JSON.parse()` pour lire les données et `JSON.stringify()` pour les convertir en JSON.
**Conclusion :** JSON est préférable pour échanger des données entre PHP et JavaScript, tandis que `serialize()` est surtout utile pour conserver des données spécifiques à PHP.
*/