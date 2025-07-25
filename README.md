# appli-vote
Appli de vote pour tester l'orchestration de conteneurs avec docker-compose

## Description

Cette application permet aux utilisateurs de voter pour la monogamie ou la polygamie et de voir les résultats.

Elle est composée des services suivants:
- PHP : Application de vote.
- Node.js : Application de résultats.
- PostgreSQL : Base de données pour stocker les votes.

La base de données devra etre persistée en local pour garder les enciens votes.

## Configuration
- Le fichier init.sql dans le dossier db du projet permet d'initialiser la base de données avec la table des votes.
- Le fichier index.php contient le formulaire HTML simple pour le vote.
- Le fichier vote.php traite les votes et les stocke dans PostgreSQL.
- Le fichier package.json contient les dépendances Node.js.
- Le fichier results.js récupére et affiche les résultats des votes.

### Prérequis

- Docker
- Docker Compose

### Installation

1. Clonez le dépôt :

```sh
git clone https://github.com/sawadogoclaver/vote-app.git
cd appli-vote
```
L'application doit etre conteneurisé pour etre lancé directement avec la commande: docker-compose up --build
Le service node devra avoir un fichier dockerfile pour compiler l'image du conteneur;
le service php ne devra pas contenir de dockerfile, son image sera directement utilisé dans le docker-compose

Cela va démarrer les services et vous pourrez accéder à l'application via (veillez respecter les numeros de port):

- PHP (Vote) : http://localhost:8080
- Node.js (Résultats) : http://localhost:3005

Cette version du projet utilise PostgreSQL pour stocker les votes, et démontre comment utiliser Docker pour gérer plusieurs services avec différentes technologies.

Le projet devra à terme avoir la struture suivante:
<img width="522" height="544" alt="Structure du projet" src="https://github.com/user-attachments/assets/39073666-f84b-4865-a4f7-6700e1864f36" />

