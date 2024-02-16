<?php
if (isset($_POST['id'])) {
    $id= $_POST['id'];
    $existTemoignage = new TemoignageController();
    $existTemoignage->acceptTemoignage($id);
}
 
?>