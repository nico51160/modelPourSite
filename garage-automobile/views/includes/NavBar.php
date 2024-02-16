<?php
$contact = new ContactController();
$messages = $contact->readAllMessages();
if (isset($_SESSION['user'])) { ?>
    <div class="nav-container">
        <nav class="navbar bg-danger">
            <a class="navbar-brand" href="http://localhost/garage-automobile/gestion-voitures">
                <span class="spn"><strong>Garage V. Parrot</strong></span>
            </a>
            <?php if ($_SESSION['user']->role === 'Administrateur') { ?>
                <a class="nav-item nav-link" href="http://localhost/garage-automobile/gestion-employes">
                    <span class="spn">Gestion des Employes</span>
                </a>
            <?php } ?>
            <a class="nav-item nav-link" href="http://localhost/garage-automobile/gestion-voitures">
                <span class="spn">Gestion des Voitures</span>
            </a>
            <a class="nav-item nav-link" href="http://localhost/garage-automobile/gestion-services">
                <span class="spn">Gestion des Services</span>
            </a>
            <div class="ml-auto d-flex justify-content-between">
                <a class="nav-item nav-link" href="http://localhost/garage-automobile/employe-profile">
                    <span class="spn"><?php echo $_SESSION['user']->login; ?></span>
                </a>
                <a class="nav-item nav-link" href="http://localhost/garage-automobile/employe-logout">
                    <span class="spn">Déconnexion</span>
                </a>
                <!-- Bouton pour afficher la modal -->
                <a class="nav-item nav-link" id="messagesLink">
                    <span class="spn"><i class="fa fa-envelope"></i> Messages</span>
                </a>
            </div>
        </nav>
    </div>
<?php } else { ?>
    <div class="nav-container">
        <nav class="navbar bg-danger">
            <a class="navbar-brand" href="http://localhost/garage-automobile/visiteur-voitures">
                <span class="spn"><strong>Garage V. Parrot</strong></span>
            </a>
            <a class="nav-item nav-link" href="http://localhost/garage-automobile/visiteur-voitures">
                <span class="spn">Voitures</span>
            </a>
            <a class="nav-item nav-link" href="http://localhost/garage-automobile/visiteur-services">
                <span class="spn">Services</span>
            </a>
            <div class="ml-auto d-flex justify-content-between">
                <a class="nav-item nav-link" href="http://localhost/garage-automobile/about">
                    <span class="spn">A propos</span>
                </a>
                <a class="nav-item nav-link" href="http://localhost/garage-automobile/employe-login">
                    <span class="spn">Connexion</span>
                </a>
            </div>
        </nav>
    </div>
<?php } ?>

