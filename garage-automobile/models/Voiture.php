<?php
class Voiture
{
    static public function create($voiture)
    {
        $sql = 'INSERT INTO voiture (nom, caracteristiques, moteur, annee, kilometrage, prix) 
                        VALUES (:nom, :caracteristiques, :moteur, :annee, :kilometrage, :prix)';
        $Connexion = Connexion::Connect();
        $pdo = $Connexion->prepare($sql);
        $pdo->bindParam(':nom', $voiture['nom'],PDO::PARAM_STR);
        $pdo->bindParam(':caracteristiques', $voiture['caracteristiques'],PDO::PARAM_STR);
        $pdo->bindParam(':moteur', $voiture['moteur'],PDO::PARAM_STR);
        $pdo->bindParam(':annee', $voiture['annee'],PDO::PARAM_INT);
        $pdo->bindParam(':kilometrage', $voiture['kilometrage'],PDO::PARAM_INT);
        $pdo->bindParam(':prix', $voiture['prix'],PDO::PARAM_INT);
        if ($pdo->execute()) {
            $lastVoitureId = $Connexion->lastInsertId();
            $destinationDirectory = '/garage-automobile/public/images/voitures/';
            foreach ($_FILES['images']['type'] as $key => $type) {
                // Vérifier le type  pour chaque fichier
                if (!in_array($type, ['image/png', 'image/jpeg'])) {
                    return 'error: le type du fichier est non autorisé'; // Arrête l'exécution si un type de fichier non autorisé est détecté
                }
            }
            foreach ($_FILES['images']['name'] as $key => $value) {
                $dossierTempo = $_FILES['images']['tmp_name'][$key];
                $dossierSite = $destinationDirectory  . $_FILES['images']['name'][$key];
                if (file_exists($dossierTempo)) {
                    move_uploaded_file($dossierTempo, $dossierSite);
                }
                $sql1 = 'INSERT INTO voiture_images (voiture_id, lien) VALUES (:voiture_id, :lien)';
                $pdo1 = Connexion::Connect()->prepare($sql1);
                $pdo1->bindParam(':voiture_id', $lastVoitureId, PDO::PARAM_INT);
                $pdo1->bindParam(':lien', $dossierSite, PDO::PARAM_STR);
                $pdo1->execute();
            }
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function read($id)
    {
        try {
            $sql = "SELECT v.id, v.nom, v.annee,v.moteur, v.kilometrage, v.caracteristiques, v.prix, GROUP_CONCAT(voiture_images.lien) AS images_liens
            FROM voiture v
            INNER JOIN voiture_images ON v.id = voiture_images.voiture_id
            WHERE v.id=:id";
            $pdo = Connexion::Connect()->prepare($sql);
            $pdo->execute(array(":id" => $id));
            $voiture = $pdo->fetch(PDO::FETCH_ASSOC);
            return $voiture;
        } catch (PDOException $e) {
            echo 'erreur' . $e->getMessage();
        }
    }

    static public function update($voiture)
    {
        $sql = "UPDATE voiture SET nom=:nom, caracteristiques=:caracteristiques, moteur=:moteur, annee=:annee, kilometrage=:kilometrage, prix=:prix WHERE id=:id";
        $pdo = Connexion::Connect()->prepare($sql);
        $pdo->bindParam(':id', $voiture['id'], PDO::PARAM_INT);
        $pdo->bindParam(':nom', $voiture['nom'],PDO::PARAM_STR);
        $pdo->bindParam(':caracteristiques', $voiture['caracteristiques'],PDO::PARAM_STR);
        $pdo->bindParam(':moteur', $voiture['moteur'],PDO::PARAM_STR);
        $pdo->bindParam(':annee', $voiture['annee'],PDO::PARAM_INT);
        $pdo->bindParam(':kilometrage', $voiture['kilometrage'],PDO::PARAM_INT);
        $pdo->bindParam(':prix', $voiture['prix'],PDO::PARAM_INT);

        if ($pdo->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }


    static public function delete($id)
    {
        $pdo = Connexion::Connect()->prepare("DELETE FROM voiture_images where voiture_id=:id");
        $pdo->bindParam(':id', $id,PDO::PARAM_INT);
        if ($pdo->execute()) {
            $pdo1 = Connexion::Connect()->prepare("DELETE FROM voiture where id=:id");
            $pdo1->bindParam(':id', $id,PDO::PARAM_STR);
            if ($pdo1->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }
    }

    static public function readByFilters($filters)
    {
        $conditions = array();
        if (!empty($filters)) {
            // Conditions de filtrage
            $conditions = array(
                !empty($filters['filtreKilometrageMin']) ? "v.kilometrage >= :kilometrage_min" : null,
                !empty($filters['filtreKilometrageMax']) ? "v.kilometrage <= :kilometrage_max" : null,
                !empty($filters['filtreAnneeMin']) ? "v.annee >= :annee_min" : null,
                !empty($filters['filtreAnneeMax']) ? "v.annee <= :annee_max" : null,
                !empty($filters['filtrePrixMin']) ? "v.prix >= :prix_min" : null,
                !empty($filters['filtrePrixMax']) ? "v.prix <= :prix_max" : null
            );
            // Filtres non vides
            $nonEmptyConditions = array_filter($conditions, function ($value) {
                return $value !== null;
            });
        }
        // Construction de la requête SQL de base
        $sql = "SELECT v.id, v.nom, v.annee,v.moteur, v.kilometrage, v.prix, GROUP_CONCAT(voiture_images.lien) AS images_liens
            FROM voiture v
            INNER JOIN voiture_images ON v.id = voiture_images.voiture_id";
        // Ajoutez les conditions à la requête SQL si elles existent
        if (!empty($nonEmptyConditions)) {
            $sql .= " WHERE " . implode(" AND ", $nonEmptyConditions);
        }
        $sql .= " GROUP BY v.id";
        $pdo = Connexion::Connect()->prepare($sql);
        // Bind des valeurs pour les filtres
        if (!empty($filters['filtreKilometrageMin'])) {
            $pdo->bindValue(':kilometrage_min', $filters['filtreKilometrageMin'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtreKilometrageMax'])) {
            $pdo->bindValue(':kilometrage_max', $filters['filtreKilometrageMax'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtreAnneeMin'])) {
            $pdo->bindValue(':annee_min', $filters['filtreAnneeMin'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtreAnneeMax'])) {
            $pdo->bindValue(':annee_max', $filters['filtreAnneeMax'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtrePrixMin'])) {
            $pdo->bindValue(':prix_min', $filters['filtrePrixMin'], PDO::PARAM_INT);
        }
        if (!empty($filters['filtrePrixMax'])) {
            $pdo->bindValue(':prix_max', $filters['filtrePrixMax'], PDO::PARAM_INT);
        }

        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

}
