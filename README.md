# Nova
Création d'une petite application pour enregistrer les informations relatives aux opérations

## Prérequis 
[Installer docker](https://docs.docker.com/get-docker/)

## Installation

1- Cloner le projet avec GitHub
<pre><code>git clone https://github.com/JessyBros/nova.git</code></pre>

2- Mise en place de l'environnement de travail avec docker compose
<pre><code>cd nova
docker-compose build
docker-compose up -d
</code></pre>

4-Relié la base de donnée

- Créer un fichier .env.local et y ajouter la connexion à votre base de donnée.
<pre><code>DATABASE_URL="mysql://root:@db_docker_symfony:3306/db_nova?serverVersion=5.7</code></pre>

5-Relié le sevice Mailer

- Ouvrir le fichier .env.local et y ajouter votre Mailer.
<pre><code>MAILER_DSN=smtp://maildev_docker_symfony:25</code></pre>


## Ouvrir votre projet sur votre navigateur

Par défaut, le projet est lancé sur le port [8741](http://127.0.0.1:8741/)
