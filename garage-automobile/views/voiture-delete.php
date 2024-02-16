<?php
if (isset($_POST['id'])) {
    $id= $_POST['id'];
    $existVoiture = new VoitureController();
    $existVoiture->deleteVoiture($id);
}
 
?>