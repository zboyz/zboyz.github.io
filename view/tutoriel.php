<?php
include 'templates/header.php';
include 'templates/sideBar.php';
// Inclure le fichier de la page correspondante
include($pages[$cle_page]);
include 'templates/pagination.php';
include 'templates/footer.php';
?>