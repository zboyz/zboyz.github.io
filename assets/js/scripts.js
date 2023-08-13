$(document).ready(function() {
  /* Start script Bouton to the top */
    $(window).scroll(function () {
        if ($(window).scrollTop() > 250) {
        $("#boutonToTheTop").show();
        } else {
        $("#boutonToTheTop").hide();
        }
    });
    $("#boutonToTheTop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    /* End script Bouton to the top */

    /* Start script animation chevron sideBar */
    $(".chevron").click(function () {
        $(this).toggleClass("bi-chevron-right bi-chevron-down");
    });
    /* End script animation chevron sideBar */

    /* Start script nav links style */
    function updateNavLinks() {
        // Obtenez l'URL de la page actuelle
        var currentPage = window.location.href;

        // Supprimez la classe "active" de tous les liens de navigation
        $("#accueil").removeClass("accueilActive");
        $("#tutoriel").removeClass("tutorielActive");
        $("#contact").removeClass("contactActive");

        // Ajoutez la classe "active" au lien correspondant à la page actuelle
        if (currentPage.includes("accueil")) {
        $("#accueil").addClass("accueilActive");
        $(".accueil").css("cursor", "default");
        $(".accueil").css("pointer-events", "none");
        $(".logoSA").css("cursor", "default");
        $(".logoSA").css("pointer-events", "none");
        } else {
        $("#accueil").addClass("accueil");
        }

        if (currentPage.includes("tutoriel")) {
        $("#tutoriel").addClass("tutorielActive");
        $("footer").removeClass("footerBar");
        $(".tutoriel").css("cursor", "default");
        $(".tutoriel").css("pointer-events", "none");
        } else {
        $("#tutoriel").addClass("tutoriel");
        }

        if (currentPage.includes("contact")) {
        $("#contact").addClass("contactActive");
        $(".contact").css("cursor", "default");
        $(".contact").css("pointer-events", "none");
        } else {
        $("#contact").addClass("contact");
        }
    }

    // Appelez la fonction updateNavLinks lorsque la page est chargée
    $(document).ready(updateNavLinks);
    /* End script nav links style */


    // Ajouter un gestionnaire d'événement click au bouton "Retour"
    $('#returnButton').on('click', function() {
        // Utiliser la fonction goBack pour revenir à la page précédente
        window.history.back();
    });




});