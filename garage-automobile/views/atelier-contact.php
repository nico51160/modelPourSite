<?php
$user = new UserController();
$telephone = $user->getAdminPhone();
if (isset($_POST['submit'])) {
    $newContact = new ContactController();
    $newContact->createContact();
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5>
                        <label>
                            Contacter l'atelier via ce numero <?php echo $telephone; ?>
                            ou en remplissant le fomrmulaire suivant :
                        </label>
                    </h5>
                </div>
                <div class="card-body bg-dark" id="box">
                    <a href="http://localhost/garage-automobile/visiteur-services" class="btn btn-light mb-2"><i class="fa fa-home"></i></a>
                    <form method="post" onsubmit="return validateForm();">
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom*</label>
                            <input type="text" class="form-control"  name="nom">
                            <span id="controleNom"></span>
                            <strong id="explicationNom"></strong>
                            

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prenom">Prénom*</label>
                            <input type="text" class="form-control" name="prenom">
                            <span id="controlePrenom"></span>
                            <strong id="explicationPrenom"></strong>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email*</label>
                            <input type="text" class="form-control" name="email">
                            <span id="controleEmail"></span>
                            <strong id="explicationEmail"></strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="telephone">Telephone*</label>
                            <input type="text" class="form-control" name="telephone">
                            <span id="controleTelephone"></span>
                            <strong id="explicationTelephone"></strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="message">Message*</label>
                            <textarea class="form-control" name="message"></textarea>
                            <span id="controleMessage"></span>
                            <strong id="explicationMessage"></strong>
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-light submit Attelier">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/garage-automobile/public/js/about.js"></script>