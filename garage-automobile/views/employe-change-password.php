<?php
if (isset($_POST['submit'])) {
    $user = new UserController();
    $result = $user->changePasswordUser();
}
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card card-header bg-dark">
                    <h5><label>Changer le mot de passe</label></h5>
                    <?php echo isset($result) ?  $result : ''; ?>
                </div>
                <div class="card-body bg-dark">
                    <a href="http://localhost/garage-automobile/gestion-employes" class="btn btn-light mb-2"><i class="fa fa-home"></i></a>
                    <form method="post">
                        <div class="form-group">
                            <label for="oldPassword">Ancien mot de passe
                                <span class="input-group-addon" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                                <input type="checkbox" id="showOldPassword">
                            </label>
                            <input type="password" class="form-control" name="oldPassword" id="oldPassword" required>
                            <input type="hidden" name="id" value="<?php echo  $_SESSION['user']->id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nouveau mot de passe
                                <span class="input-group-addon" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                                <input type="checkbox" id="showNewPassword">
                            </label>
                            <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                            <input type="hidden" name="id" value="<?php echo  $_SESSION['user']->id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirmer le nouveau mot de passe
                                <span class="input-group-addon" >
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                                <input type="checkbox" id="showConfirmPassword">
                            </label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                            <input type="hidden" name="id" value="<?php echo  $_SESSION['user']->id; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-light">Changer le mot de passe</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script></script>
