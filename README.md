# Delice De Cuisine


Ce projet est un site web de type blog qui recense des recettes de cuisine et permet aux utilisateurs de les consulter et de les commenter.
## Table des matières

- [Caractéristiques](#caractéristiques)
- [Technologies](#technologies)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Contact](#contact)

## Caractéristiques

- Fonctionnalité A
- Fonctionnalité B
- Fonctionnalité C
- Et bien plus encore...

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
cd mon-projet-genial
composer install
```
###
3. Configurez les variables d'environnement et la base de données dans le fichier .env.
###

4. Lancez le serveur de développement :

```bash
symfony server:start
```
###
5. Créez la base de données et faites les migrations :

```bash
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```
