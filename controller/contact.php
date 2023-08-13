<?php

class ContactController {
    function index () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nom = ucfirst($_POST['name']);
            $email = $_POST['email'];
            $message = $_POST['message'];
        
            // Envoyer l'e-mail
            $to = "votre_email@votre_domaine.com"; // Remplacez ceci par votre adresse e-mail
            $sujet = "Nouveau message du formulaire de contact du tutoriel Symfony 6";
            $contenu = "Nom: ". ucfirst($nom) . "\n";
            $contenu .= "Email: $email\n";
            $contenu .= "Message: $message\n";

            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";

            // Envoi de l'e-mail
            mail($to, $sujet, $contenu, $headers);
        }
        require_once 'view/contact.php';
    }
}