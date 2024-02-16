<?php
class ContactController
{

    public function createContact()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'message' => $_POST['message'],
            );
            $result = Contact::create($data);
            if ($result === 'ok') {
                header('location: visiteur-services');
            } else {
                echo $result;
            }
        }
    }

    public function readAllMessages()
    {
        $Messages = Contact::readAll();
        return $Messages;
    }
}
