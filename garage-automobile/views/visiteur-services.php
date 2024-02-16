<?php
$service = new ServiceController();
$services = $service->readAllServices();
?>
<div class="container">
    <div class="row mt-4">
        <?php foreach ($services as $service) { ?>
            <div class="col-md-4 mb-4">
                <div class="card bg-dark">
                    <img src="<?= $service['image']; ?>" class="card-img-top image" alt="<?= $service['nom']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $service['nom']; ?></h5>
                        <p class="card-text">Description: <?= $service['description']; ?></p>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                            <button type="submit" formaction="http://localhost/garage-automobile/atelier-contact" class="btn btn-light">Contacter l'atelier</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>