<?php

$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$parts = explode('/', $path);
$page = '/'.end($parts);
// $page contient maintenant la partie de l'URL après le dernier /

// Traiter la route demandée
switch ($page) {
    case '/':
    case '':
    case '/accueil';
    case'/index':
        require_once 'controller/index.php';
        $controller = new IndexController();
        $controller -> index();
        break;
    case'/tutoriel':
        require_once 'controller/tutoriel.php';
        $controller = new TutorielController();
        $controller -> index();
        break;
    case'/contact':
        require_once 'controller/contact.php';
        $controller = new ContactController();
        $controller -> index();
        break;
        default:
        // Route non trouvée, afficher une page d'erreur
        require_once 'controller/page404.php';
        $controller = new Page404Controller();
        $controller -> index();
        break;
    }




