<?php
$service = new ServiceController();
$services = $service->readAllServices();
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-3 mx-auto">
            <div class="card">
                <div class="card-body  bg-dark">
                    <a href="http://localhost/garage-automobile/service-create" title="Ajouter service" class="btn btn-light"><i class="fa fa-plus"></i></a>
                    <span class="mb-4"><strong>Ajouter un service</strong></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <?php foreach ($services as $service) { ?>
            <div class="col-md-4 mb-4">
                <div class="card bg-dark card-hover">
                    <img src="<?= $service['image']; ?>" class="card-img-top image" alt="<?= $service['nom']; ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?= $service['nom']; ?></h4>
                        <p class="card-text">Description: <?= $service['description']; ?></p>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                            <button type="submit" formaction="http://localhost/garage-automobile/service-update" class="btn btn-sm btn-light ml-2"><i class="fa fa-edit"></i></button>
                            <button type="submit" formaction="http://localhost/garage-automobile/service-delete" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>