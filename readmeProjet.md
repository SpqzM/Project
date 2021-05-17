# Projet final

## Liste des équipes

1. Albert - Philippe
2. Kevin - Ricardo
3. Arthur - Hugo
4. Laurent - Nicolas
5. Mehdi - Owen
6. Sandrine - Cédric

## Mise en place du projet

Personne A : 
1. Création du dépôt github projet (à faire sur la plateforme github)
2. Cocher la case "Add a README.md"
3. Donner les droits à votre partenaire (personne B)
4. Dans le dossier dev (ou developpement...), installer Laravel
    ```
    composer create-project laravel/laravel projet
    ```
    Cela va créer un dossier projet avec Laravel dedans
5. Créer le dépôt git
    ```
    cd projet
    git init
    ```
6. Ajouter les fichiers de Laravel sur git
    ```
    git add -A
    ```
7. Faire le commit
    ```
    git commit -m "setup Laravel"
    ```
8. Changer la branche
    ```
    git branch -M main
    ```
9. Ajouter l'url du dépôt github sur lequel les modifications vont être envoyées
    ```
    git remote add origin https://github.com/{nom utilisateur qui a fait le dépôt}/{nom du dépôt}.git
    ```
10. Récupérer les données déjà existantes du dépôt
    ```
    git pull origin main --allow-unrelated-histories
    ```
11. Régler le conflit sur le fichier README.md
    Dans le fichier README.md, garder ce qui vous intéresse (juste le titre par exemple)
12. Pousser les modifications vers le dépôt github
    ```
    git add -A
    git commit -m "merge README.md"
    git push -u origin main
    ```

Personne B :
1. Dans le dossier dev, cloner le dépôt github
    ```
    git clone https://github.com/{nom utilisateur qui a fait le dépôt}/{nom du dépôt}.git
    ```
2. Dans le dossier créé (projet si le dépôt s'appelle projet), installer les dépendances de Laravel
    ```
    cd projet
    composer install
    ```
3. Créer le fichier .env
    ```
    cp .env.example .env
    ```
4. Mettre en place la clé de l'application
    ```
    php artisan key:generate
    ```

Personne A et personne B :
1. Modifier le fichier .env pour y ajouter vos informations de connexion à la base de données
2. Créer la base de données indiquée dans le fichier .env (par exemple nomutilisateur_projet, en utf8mb4 unicode ci)
3. Lancer les migrations
    ```
    php artisan migrate
    ```
4. Vérifier en base de données que les migrations sont bien passées.

## Cahier des charges

* Accueil - Affichage des 5 dernières questions (de la plus récente à la plus ancienne)
* Liste des questions (titre, extrait de la description, catégories, lien vers la question)
* Détail de la question et liste des réponses (de la plus ancienne à la plus récente)
* Créer une question (seulement si vous êtes connecté)
* Répondre à une question (seulement si vous êtes connecté)
* Inscription utilisateur (nom et email uniques, mot de passe au-moins 6 caractères)
* Connexion utilisateur (avec la case "se souvenir de moi")
* Affichage du profil (nom, email, liste des questions posées, liste des questions répondues)
* Modifier le profil (nom, mot de passe)
* Liste des utilisateurs (nom, nombre de questions, nombre de réponses, date de dernière connexion)
* Filtre des utilisateurs sur le nom tapé dans un champ de recherche (pas de rechargement de la page)
* Vote des réponses - +1 ou -1 - (pas de rechargement de la page, seulement si vous êtes connecté, 1 vote par réponse au maximum)