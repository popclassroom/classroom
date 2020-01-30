# Popsclassroom

ce site est destiné a apprendre la programmation, en se bassant plus sur la pratique et avec un minimun de théorique 


## Comment Installer 

### Prérequies : 

- [composer](https://getcomposer.org/)
- la commande Symfony ( pour le dev ) 
- PHP 7.2


### pour le Développement 

1. ouvrir un terminal dans votre espace de travail 
2. taper dans le terminal : `git clone git@github.com:popclassroom/classroom.git` 
3. déplacer vous dans le projet : `cd classroom` 
4. installer les dépendances : `composer install` 
5. crée un fichier **.env.local** en ce servant du fichier **.env** comme modele et configurer ( login BDD, parametres SMTP, etc ) 
6. crée la BDD en tapant : `php bin/console do:da:create` 
7. executer les script de migration de la BDD en tapant : `php bin/console do:mi:mi`
8. lancer le serveur de dev : `symfony server:start -d` 

### pour la production 

( à venir ) 

## Structure des table de donnée : 

- **user** : table contenant les info des utilisateur 
- **Activity** : table contenant les sujet des activité a faire 
- **Activity** : table contant les activité réalisé par les eleves 
- **ActivityCorrection** : table contenant les correction des activité ( correction en Pair to Pair ) 
- **Category** : table contenant la liste de tous les catégories ( PHP, Javascript, HTML, Back-end, Front-end, etc ) 
- **Course** : table contenant la totalité du cours regroupant les divers lecon qui en font partie 
- **Lesson** : table contenant les leçon fessant partir d'un cours 

