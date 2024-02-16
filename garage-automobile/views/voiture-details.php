<?php
$voitureController = new VoitureController();

if (isset($_POST['id'])) {
    $voitureId = $_POST['id'];
    $voiture = $voitureController->readVoiture($voitureId);
}
?>
<div class="container">
    <div class="row m-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Détails de la voiture</label></h5>
                </div>
                <?php
                $liens = explode(",", $voiture['images_liens']);
                $count = 0; // Compteur d'images
                foreach ($liens as $lien) {
                    // Si le compteur est divisible par 2, commencez une nouvelle ligne
                    if ($count % 2 == 0) {
                        echo '<div class="row">';
                    }
                ?>
                    <div class="col-md-6">
                        <img src="<?= $lien ?>" class="card-img-top mb-3 img-detail" alt="<?= $voiture['nom']; ?>">
                    </div>
                <?php
                    // Si le compteur est divisible par 2 ou que c'est la dernière image, fermez la ligne
                    if ($count % 2 == 1 || $count == count($liens) - 1) {
                        echo '</div>';
                    }
                    $count++;
                }
                ?>
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?= $voiture['nom']; ?></h5>
                    <p class="card-text">Caracteristiques : <?= $voiture['caracteristiques']; ?></p>
                    <p class="card-text">Année: <?= $voiture['annee']; ?></p>
                    <p class="card-text">Moteur: <?= $voiture['moteur']; ?></p>
                    <p class="card-text">Kilométrage: <?= $voiture['kilometrage']; ?></p>
                    <p class="card-text">Prix: $<?= $voiture['prix']; ?></p>
                    <?php if (isset($_SESSION['user'])) {  ?>
                        <a href="http://localhost/garage-automobile/gestion-voitures" class="btn btn-outline-light mb-2"><i class="fa fa-arrow-left"></i> Retour</a>
                    <?php } ?>
                    <?php if (!isset($_SESSION['user'])) {  ?>
                        <a href="http://localhost/garage-automobile/atelier-contact" class="btn btn-light mb-2">Canctacter l'atelier</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>