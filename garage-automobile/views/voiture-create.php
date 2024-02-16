<?php
if (isset($_POST['submit'])) {
    $newVoiture = new VoitureController();
    $newVoiture->createVoiture();
}
?>
<div class="container">
    <div class="row mb-4 mt-4">
        <div class="col-md-8  mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Ajouter une voiture</label></h5>
                </div>
                <div class="card-body bg-dark">
                    <a href="http://localhost/garage-automobile/gestion-voitures" class="btn btn-light mb-2"><i class="fa fa-home"></i></a>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom*</label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="caracteristiques">Caracteristiques*</label>
                            <textarea class="form-control" name="caracteristiques"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="moteur">Moteur*</label>
                            <input type="text" class="form-control" name="moteur">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="annee">Annee de mise en circulation*</label>
                            <input type="number" class="form-control" name="annee">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="kilometrage">Kilometrage*</label>
                            <input type="number" class="form-control" name="kilometrage">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prix">Prix($)*</label>
                            <input type="number" class="form-control" name="prix">
                        </div>
                        <label for="images">Images :</label>
                        <input type="file" name="images[]" id="images" required multiple accept="public/images/voitures/*" ><br>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-light">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>