<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page5" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">5 - Inscription et authentification des utilisateurs
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/INfHFDIjgrw?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="5 - Inscription et authentification des utilisateurs (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="authCreate" class="fw-bolder mt-4">5.1 - Création de l'authentification</h3>
            <p>Nous allons créer l'authentification pour que l'utilisateur puisse rentrer ses informations et se
                connecter dans notre site.</p>
            <p>Dans votre terminal taper cette ligne de commande :</p>
            <p><span class="text-info bg-dark px-2 pb-1">symfony console make:auth</span></p>
            <p>Ensuite suivez les instructions comme l'image ci-dessous :
                <a target="_blank" href="assets/img/Capture_Creation_Auth.png">
                    <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Creation_Auth.png" alt="Capture d'écran pour la création d'un authentificateur sur Symfony 6"></a>
            </p>
            <p>Alors cette commande a créé plusieurs modifications dans votre projet :</p>
            <ul>
                <li>Modification du fichier "security.yaml" qui se trouve dans le dossier "config/packages"</li>
                <li>Création d'un fichier "SecurityController.php" dans le dossier "src/Controller"</li>
                <li>Création d'un fichier "UsersAuthenticator.php" dans le dossier "src/Security"</li>
                <li>Création d'un dossier "security" dans le dossier "templates" et création d'un fichier "login.html.twig"</li>
            </ul>
            <p>Dans le fichier "UsersAuthenticator.php" vous allez modifier les lignes n°9 et 10 comme ci dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Codes1.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Codes1.png" alt="Capture d'écran modifications des ligne du fichier UsersAuthenticator"></a>
            <p>Pour un meilleur visuel vous pouvez changer les lignes dans le fichier "login.html.twig" comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_loginHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Fichier_loginHtmlTwig.png" alt="Capture d'écran modifications des ligne du fichier login.html.twig"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="createFormInscription" class="fw-bolder mt-4">5.2 - Création d'un formulaire d'inscription</h3>
            <p>Dans votre terminal taper cette ligne de commande :</p>
            <p><span class="text-info bg-dark px-2 pb-1">symfony console make:registration-form</span></p>
            <p>Ensuite suivez les instructions comme l'image ci-dessous :
                <a target="_blank" href="assets/img/Capture_Creation_Form_Inscription.png">
                    <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Creation_Form_Inscription.png" alt="Capture d'écran pour la création d'un formulaire d'inscription sur Symfony 6"></a>
            </p>
            <p>Alors cette commande a créé plusieurs modifications dans votre projet :</p>
            <ul>
                <li>Modification du fichier "security.yaml" qui se trouve dans le dossier "config/packages"</li>
                <li>Création d'un fichier "RegistrationController.php" dans le dossier "src/Controller"</li>
                <li>Création d'un dossier "Form" et d'un fichier "RegistrationFormType.php" dans le dossier "src"</li>
                <li>Modification du fichier "Users.php" dans le dossier "src/Entity"</li>
                <li>Création d'un dossier "Registration", dans le dossier "src/templates" et d'un fichier "register.html.twig"</li>
            </ul>
            <p>Dans le fichier "RegistrationFormType.php", nous allons rajouter les entités de la table "Users" pour que, lorsque
                nous allons dans la page d'inscription, nous complèterons tous les champs pour que la base de données soit bien renseignée.
            </p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_RegistrationFormType.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Fichier_RegistrationFormType.png" alt="Capture d'écran pour la modification du formulaire d'inscription sur Symfony 6"></a>
            <p>Nous allons aussi modifier dans le fichier "register.html.twig" la ligne qui comporte le code "agreeTerms" par "RGPDConsent",
                et restyliser le formulaire pour le côté visuel du site.
            </p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_RegisterHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Fichier_RegisterHtmlTwig.png" alt="Capture d'écran pour la modification du code pour le RGPDConsent"></a>
            <p>Modifier aussi la propriété "created_at" dans le fichier "Users" dans le dossier "src/Entity" en rajoutant cette ligne de code dans le "__construct"</p>
            <p><span class="text-info bg-dark px-2 pb-1">$this->created_at = new \DateTimeImmutable();</span></p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_RegisterHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Fichier_RegisterHtmlTwig2.png" alt="Capture d'écran pour la modification du code pour le DateTimeImmutable"></a>
            <p>Connectez vous à votre mySQL et vous pouvez remplir maintenant le formulaire d'inscription.</p>
            <p>Nous allons styliser le template de navigation donc le fichier "_nav.html.twig" dans le répertoire "src/templates/_partials".</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_NavHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Fichier_NavHtmlTwig.png" alt="Capture d'écran pour la modification du fichier _nav.html.twig"></a>
            <h3>Nous avons terminé avec l'authentification et le formulaire d'inscription pour notre projet.</h3>
        </div>
    </div>
</div>