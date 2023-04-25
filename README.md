# STUDI-ECF-Entrainement-Dieteticienne

Sandrine Coupart est une diététicienne-nutritionniste dont le cabinet est situé à Caen. En tant que
professionnelle de santé, elle prend en charge des patients dans le cadre de consultations diététiques.
Madame Coupart anime également des ateliers de prévention et d’information sur la nutrition

## Technologies utilisées

Ce site web a été développé en utilisant les technologies suivantes :

- Symfony 6 / PHP 8.1 / EasyAdmin 4 : pour la gestion du contenu du site
- HTML / CSS / JavaScript : pour la mise en page et les interactions/animations de l'utilisateur
- Bootstrap : pour la création d'un design réactif et mobile-friendly

## Projet crée par

- Yoni-Alexandre Brault : Développeur / Designer

## Importer et configurer le projet "Sandrine Coupart Diététicienne"

- Ce guide vous expliquera comment importer le projet Symfony "Sandrine Coupart Diététicienne" à partir de GitHub et le configurer avec une base de données SQL.

## Prérequis

- Avoir installé Composer
- Avoir un compte GitHub et avoir installé Git sur votre ordinateur
- Avoir un serveur web et une base de données SQL (Laragon, XAMPP, WAMPP etc..)

## Etapes pour l'installation du projet "Sandrine Coupart Diététicienne"

- Ouvrez votre terminal (ou le terminal depuis votre IDE) et rendez-vous dans le répertoire où vous souhaitez importer le projet :

```cd /chemin/de/votre/projet```
 
- Clonez le dépôt GitHub en utilisant la commande suivante :

```git clone https://github.com/Yoni-Alexandre/STUDI-ECF-Entrainement-Dieteticienne.git```

- Une fois le dépôt cloné, rendez-vous dans le répertoire du projet avec la commande :

```cd REPO_NAME```

- Installez les dépendances du projet avec Composer en utilisant la commande :

```composer install```

- Ouvrez le fichier .env et modifiez les paramètres de configuration de la base de données en fonction de votre environnement local.

- Mettre en route le serveur de base de données (Laragon, XAMPP, WAMPP etc..)

- Créez la base de données en utilisant la commande :

```symfony console doctrine:database:create```

- Exécutez les migrations de la base de données en utilisant la commande (Les migrations dans Symfony sont déjà créees):

```symfony console doctrine:migrations:migrate```

- Et voilà, le projet Symfony est maintenant importé et configuré avec une base de données SQL. 
- Vous pouvez maintenant lancer le serveur de développement avec la commande :

```symfony serve:start``` ou ```symfony serve -d``

- Et accéder à l'application en ouvrant votre navigateur à l'adresse http://localhost:8000.

## Création d'un Administrateur

- Depuis un terminal (sous réserve d'avoir configuré les variables d'environnement (sous Windows)), acceder à la base de données

```mysql -u root -p```

- Repmlir le mot de passe demandé (touche Entrée s'il n'y a pas de mot de passe dans le .env de l'application symfony)

- Se connecter à la base de données (nom inscrit dans le .env, pour ma part le nom de ma base est "studi_dieteticienne")
- Pour voir les base de données existantes (SHOW DATABASES;)

```USE studi_dieteticienne;```

- vérifier que les tables soient bien importées

```SHOW TABLES;```

- Controller la table "users" pour voir les champs sont remplis (si vide aucunes données ne seront visibles)

```SELECT * FROM users;```

- Créer un administrateur dans la table "users" en lui donnant le role "ROLE_ADMIN"

```INSERT INTO users (email, roles, password, lastname, firstname) VALUES ('admin@studi-sandrine-coupart.ybr', '[\"ROLE_ADMIN"\]', '$2y$13$RztYrnXRCgAeF5r6PTBnjOQ7uvGXSTeaQhNUKKers.8JEQHn7EyEG', 'Admin', 'admin-dieteticienne');```

- Le mot de passe crypté correspond à "123456"

- Depuis le site, se connecter en utilisant les identifiants suivants : admin@studi-sandrine-coupart.ybr et le mot de passe "123456"

- Si problème, supprimer la base de données et recommencer les étapes ci-dessus

```DROP DATABASE studi_dieteticienne;```

- se rendre sur la page "Mon compte" et cliquer sur "Console d'administration" pour pouvoir integrer des données sur le site.
