<?php
$horaire = new HoraireController();
$horaires = $horaire->readAllHoraires();
?>
<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body bg-dark">
                    <h3>Horaires d'ouverture du garage</h3>
                    <table class="table text-white">
                        <tbody>
                            <?php foreach ($horaires as $horaire) { ?>
                                <tr>
                                    <td><?php echo $horaire['jour']; ?></td>
                                    <td><?php echo $horaire['matinee']; ?></td>
                                    <td><?php echo $horaire['apresmidi']; ?></td>
                                    <?php if (isset($_SESSION['user']) && ($_SESSION['user']->role === 'Administrateur') ) {  ?>
                                        <td class="d-flex flex-row">
                                            <form class="ml-2" method="post" action="horaire-update">
                                                <input type="hidden" name="id" value="<?php echo $horaire['id']; ?>">
                                                <button type="submit" class="  btn  btn-sm btn-light  "><i class="fa fa-edit"></i></button>
                                            </form>
                                        </td>
                                    <?php }  ?>
                                </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>