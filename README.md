# Nova
Création d'une petite application pour enregistrer les informations relatives aux opérations

## Prérequis 
[Installer docker](https://docs.docker.com/get-docker/)

## Installation

### 1- Cloner le projet avec GitHub
<pre><code>git clone https://github.com/JessyBros/nova.git</code></pre>

### 2- Mise en place de l'environnement de travail avec docker compose
<pre><code>cd nova
docker-compose build
docker-compose up -d
</code></pre>

### 3-Entrer dans le shell du conteneur docker pour utiliser les commandes
<pre><code>docker exec -it www_docker_symfony bash</code></pre>

### 4- Installer les librairies du projet avec composer
<pre><code>cd project/</code></pre>
<pre><code>composer install</code></pre>

### 5- Mise en place de la la base de donnée
#### Relié la base de donnée
- Créer un fichier .env.local et y ajouter la connexion à votre base de donnée.
<pre><code>DATABASE_URL="mysql://root:@db_docker_symfony:3306/db_nova?serverVersion=5.7</code></pre>

#### Créer la base de donnée
<pre><code>composer prepare</code></pre>

#### Ajouter les jeux de fausses données
<pre><code>php bin/console doctrine:fixtures:load -n</code></pre>

### 6- Relié le sevice Mailer

- Ouvrir le fichier .env.local et y ajouter votre Mailer.
<pre><code>MAILER_DSN=smtp://maildev_docker_symfony:25</code></pre>

## Ouvrir votre projet sur votre navigateur

Par défaut, le projet est lancé sur le port [8741](http://127.0.0.1:8741/)

## Manipuler les tests automatisées
Le but est de créer une base de donnée pour les tests. Cela permettra de ne pas corrompre les données de la base de donnée utilisée pour le projet existant.

#### Configuration des fichiers
- Créer un fichier __".env.test.local"__. 
- Relié le chemin vers la nouvelle base de donnée en ajoutant "_test". (*exemple : db_test_nova*)

#### Alimenter la base de donnée
<pre><code>composer prepare-test</code></pre>

#### Lancer les tests
<pre><code>./vendor/bin/phpunit</code></pre>