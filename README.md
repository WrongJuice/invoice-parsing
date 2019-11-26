**Projet MPAPWS**
=====================

# Objectif 

Ce document fournit une architecture type pour votre projet MPAPWS. Cette architecture se base sur une conception basée sur des images logicielles de type docker gérées par le programme de composition des services, nommé « docker-compose ». 

Nous considérons alors un projet nommé **MPAPWS**. 

Ce nom doit être remplacé par le nom de votre projet réel. 

# Architecture

## Images docker du projet 

L'architecture du projet **MPAPWS** est basée sur 2 images docker :
* **iutlr-info-apache-symfony4-mpapws** : gère le code source Symfony4 de l'application, qui se trouve dans dans le dossier « **mpapws** »

* **iutlr-info-mysql-mpapws** : gère la base de données mysql du projet, qui se trouve dans le dossier « **mysql** »

Ces deux images docker sont instanciées pour démarrer deux conteneurs respectivement :    
* **iutlr-info2-projet-mpapws** : conteneur exécutant le code source du projet  
* **iutlr-info2-mysql-mpapws** : conteneur exécutant la base de données du projet 

## Archiecture physique 

**projet_mpapws/**  
├── README.md     
├── mpapws/     
├── mysql/   
├── build/  
└── docker-compose.yml  

* **mpapws** : le projet MPAPWS en Symfony4, avec :
    * url d'accès : "http://mpapws.loc:9999" 
    * les fronts en twig
    * les données gérées par doctrine à partir du serveur **mysql**

* **mysql** : le serveur mysql gérant la base de données : 
    * url d'accès : en JDBC sur localhost:3306
    * MYSQL_DATABASE: db-mpapws
    * MYSQL_USER: mpapws
    * MYSQL_PASSWORD: mpapws
    * MYSQL_ROOT_PASSWORD: mpapws

* **build** : les fichiers dockerfile pour construire les images nécessaires à partir du registry public de l'IUT : 
    * url du registry : http://registry.univ-lr.fr:80 
    * **IMPORTANT** : ajouter ce registry dans la config du deamon docker, exemple voir, la capture ci-dessous pour la config de docker sous OSX : 
    <div align="center" ><img alt="config registry docker OSX" src="ressources/osx-docker-registry-config.png" width="300" height="300" /></div>

# Mise en oeuvre

## Construction et démarrage 

* Vérifier que le programme docker est démarré 

* Ouvir un terminal et se déplacer dans le dossier du projet 
``` 
cd projet_mpapws/
```

* Construire les images docker du projet : 
``` 
docker-compose build 
```

* Démarrer les conteneurs docker du projet :
``` 
docker-compose up
```
Remarque : ne pas fermer ce terminal après le démarrage des conteneurs 

## Gérer les images/conteneurs docker du projet 

* Ouvir un terminal et se déplacer dans le dossier du projet 
``` 
cd projet_mpapws/
```

* Consulter le status des conteneurs : 
```
docker-compose ps 
```

* Consulter quelques informations sur les images et les conteneurs du projet : 
```
docker-compose images
```

* Arrêter les conteneurs : 
```
docker-compose stop 
```

* Supprimer les conteneurs :
```
docker-compose rm 
```

* Se connecter en bash sur un conteneur démarré : 
```
docker exec -it (nom du conteneur ou id) bash 
```
ou 
```
docker-compose exec (nom du service) bash 
```

# Déclaration des hosts côté client

* Le conteneur **iutlr-info2-projet-mpapws** est accessible en http sur le port 9999 via son virtual host attaché à ce conteneur :
    * http://mpapws.loc:9999 

* La configuration du virtual host se trouve dans le dossier « vhosts » dans « build/mpapws/vhosts ». 

* Par conséquence, le client qui souhaite accéder à ce host dpoit déclarer le vhost dans le fichier « hosts » de sa machine comme suite :
```
127.0.0.1     mpapws.loc
```

# Création du projet Symfony **mpapws**

* Démarrer les conteneurs docker du projet 

* Ouvrir un terminal bash sur le conteneur **iutlr-info2-projet-mpapws**

* Normalement, le répertoire de travail est : « /var/www/html »

* Créer le projet Symfony suivant le modèle website-skeleton, nommé **mpapws** et se restreindre à la version "4.3.*" (attention, mettre le nom réel de votre projet) : 

```
composer create-project symfony/website-skeleton mpapws "4.3.*"
```







