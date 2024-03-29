# Delice De Cuisine


Ce projet est un site web de type blog qui recense des recettes de cuisine et permet aux utilisateurs de les consulter et de les commenter.
## Table des matières

- [Caractéristiques](#caractéristiques)
- [Technologies](#technologies)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Améliorations](#améliorations)
- [Difficultés](#difficultés)
- [Contact](#contact)

## Caractéristiques

- Minimum Responsive
- Sécurité des données (hashage des mots de passe, validation des données, crud,...)
- Système de commentaires
- Système d'administration
- Frontend en Tailwind créé par moi-même
- Fonction js simple 

## Technologies

Ce projet utilise les technologies suivantes :

- [Symfony](https://symfony.com/)
- [Tailwind](https://tailwindcss.com/)
- [MySQL](https://www.mysql.com/)
- [NodeJS](https://nodejs.org/en/)


## Installation

Suivez ces étapes pour installer le projet localement :

1. Clonez le dépôt Git :

```bash
git clone https://github.com/RomeoFroger49/DeliceDeCuisine.git
```
###
2. Installez les dépendances :

```bash
cd DeliceDeCuisine
composer install
npm install
```
###
3. Configurez les variables d'environnement et la base de données dans le fichier .env.

###
4. Créez la base de données et faites les migrations :

```bash
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```
###
5. Lancez le serveur de développement :

```bash 
symfony serve -d
npm run dev
```

## Utilisation

Pour utiliser le projet, suivez ces étapes :

1. Créez un compte utilisateur. Le premier compte créé sera automatiquement administrateur.
2. Veuillez ensuite aller le fichier src/Entity/User.php et supprimer la ligne 54. 
3. Connectez-vous avec votre compte Admin et accéder à l'interface d'administration pour y ajouter des recettes. Créez ensuite 3 recettes minimum (pour une expérience visuelle optimal).
4. La création de recette se présente sous la forme d'un formulaire. Vous pouvez y ajouter le nom, la description qui comporte les ingrédients et les ingrédients (il aurait été préférable d'avoir une table ingrédients séparée, mais je n'ai pas eu le temps de le faire), la photo de la recette (tous les formats et tailles sont acceptés) et enfin le prix qui va de 1 à 3.
5. Créer vous ensuite un compte utilisateur et connectez-vous avec (après la registration nous ne sommes pas directement redirigés vers la page en étant connectés, car normalement il y a un système de vérification d'email, mais je ne l'ai pas mis en place). Vous pouvez maintenant consulter les recettes et les commenter.

## Améliorations

- Ajouter un système de vérification d'email lors de la création de compte.
- Ajouter une table ingrédients séparée pour pouvoir rentrer en ingrédients de chaque recette une liste d'objet {ingrédients : quantité}.
- Ajouter un système de pagination pour les recettes.
- Ajouter un système de filtre pour les recettes, tri alphabétique, par note moyenne, par indice de prix (1 à 3) ou même par temps ce qui peut aussi donner lieu à des rubriques telles que, 'repas étudiants', 'repas rapide', 'nos best-sellers'.
- Ajouter un service pour envoyer les informations du controller du header vers les autres pages, car actuellement je suis obligé de mettre dans chaque render des controllers qui incluent sur leur modèle le header la variable pour ma fonction js.

## Difficultés

- La gestion des images a été la plus difficile. J'ai dû apprendre à utiliser la librairie VichUploaderBundle pour uploader les images et les lier à l'entité recette.
- La gestion des commentaires a été aussi assez difficile. Créer une entité commentaires relier au user et à la recette.
