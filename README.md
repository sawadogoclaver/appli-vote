# appli-vote
Appli de vote pour tester l'orchestration de conteneurs avec docker-compose

## Description

Cette application permet aux utilisateurs de voter pour la monogamie ou la polygamie et de voir les résultats.

Elle est composée des services suivants:
- PHP : Application de vote.
- Node.js : Application de résultats.
- PostgreSQL : Base de données pour stocker les votes.

## Configuration

### Prérequis

- Docker
- Docker Compose

### Installation

1. Clonez le dépôt :

```sh
git clone https://github.com/votre-utilisateur/vote-app.git
cd appli-vote
```
L'application doit etre conteneurisé pour etre lancé directement avec la commande: docker-compose up --build

Cela va démarrer les services et vous pourrez accéder à l'application via :

- PHP (Vote) : http://localhost:8080
- Node.js (Résultats) : http://localhost:3001
