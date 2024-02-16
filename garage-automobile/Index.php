<?php
include('views/includes/Header.php');
include('Autoload.php');
include('views/includes/NavBar.php');
$gestionPages = [
    'gestion-voitures', 'voiture-create', 'voiture-details', 'voiture-delete', 'voiture-update',
    'gestion-employes', 'employe-create', 'employe-delete', 'employe-profile', 'employe-change-password', 'employe-logout',
    'gestion-services', 'service-create', 'service-delete', 'service-update',
    'horaire-display','horaire-update',
    'temoignage-create', 'temoignage-accept','temoignage-display',
];
$visiteurPages = [
    'visiteur-voitures', 'visiteur-services',
    'voiture-details',
    'employe-login',
    'atelier-contact',
    'horaire-display',
    'temoignage-create','temoignage-display',
    'about'
];
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "true") {
    if (isset($_GET['page'])) {
        if (in_array($_GET['page'], $gestionPages)) {
            include('views/' . $_GET['page'] . '.php');
        } else {
            include('views/includes/404.php');
        }
    }
} elseif (isset($_GET['page'])) {
    if (in_array($_GET['page'], $visiteurPages)) {
        include('views/' . $_GET['page'] . '.php');
    } else {
        include('views/includes/404.php');
    }
} else {
    include('views/visiteur-voitures.php');
}
include('views/includes/Footer.php');

