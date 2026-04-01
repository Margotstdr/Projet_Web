# Projet Web — EFREI

Site web de gestion des permanences et des cours de l'EFREI, développé avec PHP, MySQL et MAMP.

---

## Dépôt GitHub

https://github.com/Margotstdr/Projet_Web

---

## Prérequis

- [MAMP](https://www.mamp.info/) installé (macOS ou Windows)
- PHP 8.x
- MySQL 8.x

---

## Installation

### 1. Placer le projet dans MAMP

Cloner ou copier le dossier dans le répertoire `htdocs` de MAMP :

**macOS**
```
/Applications/MAMP/htdocs/Projet_Web/
```

**Windows**
```
C:\MAMP\htdocs\Projet_Web\
```

### 2. Démarrer MAMP

Lancer MAMP et démarrer les serveurs Apache et MySQL.

Les ports par défaut utilisés par ce projet sont :
- **Apache :** 8888
- **MySQL :** 8889

> **Windows :** les ports par défaut de MAMP pour Windows sont parfois 80 (Apache) et 3306 (MySQL). Si c'est le cas, mettre à jour le port dans `html/db.php` (remplacer `8889` par `3306`) et accéder au site via `http://localhost/Projet_Web/html/connexion.php`.

### 3. Créer la base de données

Ouvrir phpMyAdmin via MAMP : `http://localhost:8888/phpMyAdmin`

Puis exécuter les fichiers SQL dans cet ordre depuis l'onglet **SQL** ou via **Importer** :

```
data/DataBase/create-db.sql
data/DataBase/Enseignants.sql
data/DataBase/Etudiant.sql
data/DataBase/Permanences.sql
data/DataBase/Presenter.sql
```

> **Important :** respecter cet ordre, `create-db.sql` doit être exécuté en premier car il crée les tables.

### 4. Vérifier la connexion à la base de données

Le fichier `html/db.php` contient les paramètres de connexion :

```
Hôte     : localhost
Port     : 8889
Base     : compte_utilisateur
Login    : root
Mot de passe : root
```

Ces valeurs correspondent aux réglages par défaut de MAMP — aucune modification nécessaire.

### 5. Accéder au site

Ouvrir dans un navigateur :

```
http://localhost:8888/Projet_Web/html/connexion.php
```

---

## Comptes de test

### Étudiante — Margot Studer

| Champ | Valeur |
|---|---|
| Login | `margot.studer` |
| Mot de passe | `abc` |
| Email | margot.studer@efrei.net |

### Enseignant — Mohamed Hamidi

| Champ | Valeur |
|---|---|
| Login | `mohamed.hamidi` |
| Mot de passe | `abc` |
| Email | mohamed.hamidi@efrei.net |

---

## Structure du projet

```
Projet_Web/
├── html/          Pages PHP (connexion, accueil, permanences, cours…)
├── css/           Feuilles de style
├── js/            Scripts JavaScript
└── data/DataBase/ Fichiers SQL (schéma + données)
```
