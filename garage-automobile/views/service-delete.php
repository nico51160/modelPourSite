<?php
if (isset($_POST['id'])) {
    $id= $_POST['id'];
    $existService = new ServiceController();
    $existService->deleteService($id);
}
 
?>