# Auteurs
- DELIEGE Victor
- VERGAERT Arthur

# Jalon 4

Netfloux est un site 'bibliothèque' d'Anime.

Les fonctionnalités des utilisateurs non-connectés sont :
- Connexion/S'enregistrer au site
- Recherche de médias
- Consulter les médias

Les fonctionnalités des utilisateurs connectés en tant que `Guest`, en plus des précédentes, sont :
- Changer ses informations de profile
- Ajouter un commentaires
- Aimer des médias
- Créer/Gérer ses playlists
- Gérer son historique de médias vus

Les fonctionnalités des utilisateurs connectés en tant que `Moderator`, en plus des précédentes, sont :
- Ajouter/Modifier/Supprimer des médias
- Supprimer des commentaires

# Installation

Cloner le projet :
```bash
git clone https://github.com/MikUwU/CDAW.git
```
Lancer le docker

Se connecter à la BDD à l'adresse :
`http://localhost:8081/`
Username: `root` Password: `root` 
- Créer une nouvelle base de donnée `netfloux` en `utf8_general_ci`

Dans un bash du docker 'php-apache' :
- Accéder au dossier 'catalogue'
```bash
cd catalogue/
```
- Mettre à jour le projet Laravel & les dependances
```bash
composer update
npm install
```
- Lancer les migrations de BDD
```bash
php artisan migrate
```
- Lancer le seeder des Médias (Remplir la BDD)
```bash
php artisan db:seed
```

# Utilisation

Se connecter au site à l'adresse :
`http://localhost:8080/catalogue/public/`

Se connecter à la BDD à l'adresse :
`http://localhost:8081/`
Username: `root` Password: `root` 

# Vidéo

TODO
