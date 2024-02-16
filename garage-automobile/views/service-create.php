<?php
if (isset($_POST['submit'])) {
    $newService = new ServiceController();
    $newService->createService();
}
?>
<div class="container">
    <div class="row mb-4 mt-4">
        <div class="col-md-8  mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Ajouter une service</label></h5>
                </div>
                <div class="card-body bg-dark">
                    <a href="http://localhost/garage-automobile/gestion-services" class="btn btn-light mb-2"><i class="fa fa-home"></i></a>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom*</label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description*</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <label for="image">Image :</label>
                        <input type="file" name="image" id="image"   accept="public/images/services/*" ><br>
                        <div class="form-group">
                            <button class="btn btn-light">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal pour afficher les erreurs -->
<div class="modal" id="errorModal" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Erreurs de formulaire</h5>
                <button type="button" class="close" data-dismiss="modal" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenu des erreurs -->
            </div>
        </div>
    </div>
</div>
