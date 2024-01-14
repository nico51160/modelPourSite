<?php
include('classes/Upload.php');

$dossier = new Upload('uploads/');
$dossier->getFolder();
$dossier->getFile();