<?php
if (isset($_POST['id'])) {
    $id= $_POST['id'];
    $existUser = new UserController();
    $existUser->deleteUser($id);
}
 
?>