# Projet Garage Automobile

Ce projet vise à développer un système de gestion pour un garage automobile utilisant PHP natif, JavaScript, CSS, Bootstrap et MySQL. Le système permettra de gérer les employés, les véhicules, les services et d'autres aspects liés à la gestion quotidienne d'un garage automobile.

## Configuration

1. Assurez-vous d'avoir un serveur Web (par exemple, Apache) installé sur votre machine (XAMPP, Laragon...).

## Configuration de la base de données

En utilisant l'invite de commande mysql.exe, exécutez ces requêtes (Pas de PhpMyAdmin) :

   - Connectez-vous à MySQL en tant qu'utilisateur 'root' :
     ```bash
     mysql -u root -p
     ```
   - Utilisez la commande SQL `CREATE DATABASE` pour créer la base de données `garage_automobile` :
     ```sql
     CREATE DATABASE garage_automobile;
     ```
   - Utilisez la commande SQL `USE` pour sélectionner la base de données nouvellement créée :
     ```sql
     USE garage_automobile;
     ```
   - Exécutez le code SQL dans le fichier `database/garage_automobile.sql` pour créer les tables nécessaires.

   - Créez un nouvel utilisateur et donnez-lui les privilèges pour gérer la base de données `garage_automobile` :
     ```sql
     CREATE USER 'nom_utilisateur' IDENTIFIED BY 'mot_de_passe';
     GRANT ALL PRIVILEGES ON garage_automobile.* TO 'nom_utilisateur';
     FLUSH PRIVILEGES;
     ```

## Utilisation

1. Placez les fichiers du projet dans le répertoire racine de votre serveur Web (htdocs pour XAMPP).
2. Assurez-vous que les images des voitures ou des services que vous souhaitez ajouter sont téléchargées dans le dossier `public/images`.
3. Accédez à l'application dans votre navigateur en ouvrant l'URL suivante : `http://localhost/garage-automatique`
4. Connectez-vous en utilisant les identifiants de l'utilisateur MySQL que vous avez créé.
