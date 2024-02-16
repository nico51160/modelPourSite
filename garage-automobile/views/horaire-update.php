<?php
$horaire = new HoraireController();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $data = $horaire->readHoraire($id);
}
if (isset($_POST['submit'])) {
    $horaire->updateHoraire();
}
?>
<div class="container">
    <div class="row mb-4 mt-4">
        <div class="col-md-8  mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Modifier l'horaire</label></h5>
                </div>
                <div class="card-body bg-dark">
                    <a href="http://localhost/garage-automobile/gestion-services" class="btn btn-light mb-2"><i class="fa fa-home"></i></a>
                    <form method="post">
                        <input type="hidden" name='id' class="form-control" value="<?= $data['id'] ?? '' ?>">
                        <div class="form-group">
                            <input type="text" disabled class="form-control" value="<?= $data['jour'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="matinee">Matinee*</label>
                            <input type="text" class="form-control" value="<?= $data['matinee'] ?? '' ?>" name="matinee">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="apresmidi">Apres Midi*</label>
                            <input type="text" class="form-control" value="<?= $data['apresmidi'] ?? '' ?>" name="apresmidi">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-light">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>