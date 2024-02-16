<?php
$temoignage = new TemoignageController();
$temoignages = $temoignage->readAllTemoignages();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (isset($_POST['submit'])) {
        $temoignage->acceptTemoignage($id);
    }
}
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body  bg-dark">
                    <a href="http://localhost/garage-automobile/temoignage-create" title="Ajouter temoignage" class="btn btn-light"><i class="fa fa-plus"></i></a>
                    <span class="mb-4"><strong>Ajouter un temoignage</strong></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <?php foreach ($temoignages as $temoignage) {
            if ($temoignage['status'] == 1) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h5 class="card-title">Auteur : <?= $temoignage['nom']; ?></h5>
                            <p class="card-text">Commentaire: <?= $temoignage['commentaire']; ?></p>
                            <p class="card-text">Note: <?= $temoignage['note']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } elseif (isset($_SESSION['user'])) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <h5 class="card-title">Auteur : <?= $temoignage['nom']; ?></h5>
                            <p class="card-text">Commentaire: <?= $temoignage['commentaire']; ?></p>
                            <p class="card-text">Note: <?= $temoignage['note']; ?></p>
                            <form method="post" action="http://localhost/garage-automobile/temoignage-accept">
                                <input type="hidden" name="id" value="<?php echo $temoignage['id']; ?>">
                                <?php if ($temoignage['status'] == 0) {  ?>
                                    <button type="submit" class="btn btn-sm btn-light ml-2">Accepter</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
        <?php }
        }; ?>
    </div>
</div>