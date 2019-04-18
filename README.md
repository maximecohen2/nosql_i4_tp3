# TP DE PROGRAMMATION

### Groupe
- Maxime Cohen
- Yann Gbedo

## Livrable

### Architecture
Le dépôt se compose d'un fichier `docker-compose.yml` permettant de lancer tout le projet.

Le dossier `docker` contient la configuration des conteneurs et le dossier `php` contient les ressources de l'api.

### Installation

Pour lancer le projet, exécutez la commande suivante :
```bash
docker-compose up -d
```

Vous pouvez maintenant accéder à l'application depuis les liens de la partie "liens".


### Liens

Pour créer une nouvelle note, il faut accéder au lien suivant via un requête HTTP POST:
```
http://localhost/notes
```

Pour la récupération/lecture des notes, il faut accéder au lien suivant via un requête HTTP GET:
```
http://localhost/notes
```

Pour la récupération/lecture d’une note s’effectuera par une requête HTTP GET sur le lien suivant :
```
http://localhost/notes/{idnotes}
```

Pour supprimer une note, il faut accéder au lien suivant via un requête HTTP DELETE :
```
http://localhost/notes/{idnotes}
```