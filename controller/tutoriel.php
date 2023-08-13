<?php

class TutorielController {
    function index () {

        // Nombre total de pages
        $total_pages = 20;
        
        // Tableau des noms de pages
        $pages = array();
        for ($i = 1; $i <= $total_pages; $i++) {
            $pages['page' . $i] = 'page' . $i . '.php';
        }
        // Récupérer les clés du tableau $pages
        $keys = array_keys($pages);
        
        // Récupérer le numéro de page à partir de l'URL, si non défini, on considère la première page
        $numero_page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        // Vérifier si le numéro de page est valide
        if (!is_numeric($numero_page) || $numero_page < 1 || $numero_page > count($pages)) {
            // Rediriger vers la première page si le numéro n'est pas valide
            header("Location: tuto.php?page=1");
            exit();
        }
        
        // Récupérer la clé du tableau correspondant au numéro de page
        $cle_page = $keys[$numero_page - 1];
        
        require_once 'view/tutoriel.php';
    }
}