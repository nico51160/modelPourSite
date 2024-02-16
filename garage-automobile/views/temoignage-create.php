<?php
if (isset($_POST['submit'])) {
    $newTemoignage = new TemoignageController();
    $newTemoignage->createTemoignage($_POST['id']);
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5>
                        <label>
                            Laissez un feedback :
                        </label>
                    </h5>
                </div>
                <div class="card-body bg-dark">
                    <form method="post">
                    <input type="hidden" class="form-control" value="<?php isset($_SESSION['user']) ? $_SESSION['user']->id : null ?>" name="id">
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom*</label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="commentaire">Commentaire*</label>
                            <textarea class="form-control" name="commentaire"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="note">Note/10*</label>
                            <input type="number" class="form-control" name="note">
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