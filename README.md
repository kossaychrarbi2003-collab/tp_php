# TP PHP — Programmation Web

## Présentation

Ce projet a été réalisé dans le cadre des travaux pratiques du module Programmation Web.

Il permet de pratiquer les bases du langage PHP, la manipulation des formulaires, le traitement des données, les fichiers CSV et JSON, les sessions, les cookies et la gestion des dates.

## Objectifs

- Déclarer et manipuler des variables et des constantes.
- Utiliser les conditions, les boucles et les tableaux.
- Traiter les formulaires HTML avec PHP.
- Lire et écrire des fichiers CSV et JSON.
- Gérer les sessions et les cookies.
- Manipuler et valider les dates.
- Organiser le code à l'aide de fichiers inclus.

## Technologies utilisées

- PHP 8.2
- HTML5
- CSS (si utilisé)
- XAMPP
- Git et GitHub

## Installation et exécution

1. Installer PHP ou XAMPP.
2. Ouvrir le terminal dans le dossier du projet.
3. Démarrer le serveur PHP :

   ```bash
   php -S localhost:8000
   ```

   Avec XAMPP sous Windows, si PHP n'est pas dans le PATH :

   ```powershell
   & "C:\xampp\php\php.exe" -S localhost:8000
   ```

4. Ouvrir le navigateur à l'adresse :

   http://localhost:8000/

## Structure du projet

- `config.php` : configuration et constantes.
- `exo1_bases.php` : bases du langage PHP.
- `exo2_flux.php` : conditions et boucles.
- `exo3_tableaux.php` : manipulation des tableaux.
- `info.html` et `info.php` : formulaires et traitement.
- `saisie.html` et `traitement.php` : saisie et validation des notes.
- `liste.php` : affichage des notes.
- `export.php` : exportation des données en JSON.
- `login.php`, `profil.php` et `deconnexion.php` : sessions et authentification.
- `dates.php` : manipulation et validation des dates.
- `includes/` : éléments communs aux pages.
- `data/` : fichiers de données de test.

## Auteur

Kossay Chrarby