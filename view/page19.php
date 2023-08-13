<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page19" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">19 - Création d'une interface d'administration sans bundle
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/8Q_1uBkGGOU?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="19 - Créer une interface d&#39;administration sans bundle (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="adminController" class="fw-bolder mt-4">19.1 - Création du contrôleur Admin</h3>
            <p> Nous allons créer l'interface d'administration manuellement pour notre projet e-commerce.</p>
            <p>Tout d'abord, nous allons créer un nouveau fichier "MainController.php" dans le répertoire "src/Controller/Admin".</p>
            <p>Nous allons y ajouter ces quelques lignes de code pour pouvoir renvoyer à la vue de notre page Admin :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/admin', name: 'admin_')]
    class MainController extends AbstractController
    {
        #[Route('/', name: 'index')]
        public function index(): Response
        {
            return $this->render('admin/index.html.twig');
        }
    }
                    </code>
                </pre>
            </div>
            <p>Ce qui nous donne l'image de ce fichier ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_MainController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_MainController.png" alt="Capture d'écran de la création du fichier MainController.php"></a>
            <p>Ensuite nous allons créer sa vue en créant un nouveau fichier "index.html.twig" dans le répertoire "templates/admin"</p>
            <p>Nous y ajouterons le code comme l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_indexHtmlTwigAdmin.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_indexHtmlTwigAdmin.png" alt="Capture d'écran de la création du fichier index.html.twig dans le dossier templates/admin"></a>
            <p>Ensuite nous allons créer un nouveau fichier "_adminnav.html.twig" dans le dossier "templates/_partials" puins nous y ajouterons ce code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier__adminnavHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier__adminnavHtmlTwig.png" alt="Capture d'écran de la création du fichier _adminnav.html.twig dans le dossier templates/_partials"></a>
            <p>Puis nous allons modifier le fichier "_nav.html.twig" dans le dossier "templates/_partials" avec le remaniemant du code du bloc "if" comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier__navHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier__navHtmlTwig.png" alt="Capture d'écran de la modification du fichier _nav.html.twig dans le dossier templates/_partials"></a>
            <p>Nous allons créer maintenant un nouveau fichier "index.html.twig" qui sera situé dans le répertoire "templates/admin/categories" et nous y ajouterons ce nouveau code comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_indexHtmlTwigAdminCategories.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_indexHtmlTwigAdminCategories.png" alt="Capture d'écran de la création du fichier index.html.twig dans le dossier templates/amdin/categories"></a>
                <p>Nous allons créer de même un nouveau fichier "index.html.twig" qui sera situé dans le répertoire "templates/admin/produits" et nous y ajouterons ce nouveau code comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_indexHtmlTwigAdminProduits.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_indexHtmlTwigAdminProduits.png" alt="Capture d'écran de la création du fichier index.html.twig dans le dossier templates/amdin/produits"></a>
            <p>Voilà enfin ce que l'on obtient dans notre navigateur :</p>
            <a target="_blank" href="assets/img/Capture_Ecran_Page_Admin_Categories.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_Page_Admin_Categories.png" alt="Capture d'écran de la page Admin avec la liste des catégories"></a>
            <a target="_blank" href="assets/img/Capture_Ecran_Page_Admin_Produits.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_Page_Admin_Produits.png" alt="Capture d'écran de la page Admin avec la liste des produits"></a>
        </div>
        <hr class="my-4">
        <div>
            <h3 id="UsersController" class="fw-bolder mt-4">19.2 - Création du contrôleur Utilisateur</h3>
            <p>Pour la création du contrôleur utilisateur nous allons voir que c'est à peu près la même chose que les admins mais en y rajoutera des rôles pour chacun.</p>
            <p>Nous allons modifier le fichier "UsersController.php" dans le répertoire "src/Controller/Admin" et y ajouter ce code :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_UsersControllerAdmin.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_UsersControllerAdmin.png" alt="Capture d'écran de la modification du fichier UsersController.php dans le dossier src/Controller/Admin"></a>
            <p>Maintenant nous allons créer la vue de ce contrôleur en modifiant le fichier "index.html.twig" dans le dossier "templates/admin/users"</p>
            <p>Nous allons créer un tableau avec toutes les informations des utilisateurs ainsi que les rôles de chacun comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_modification_indexHtmlTwigUsersAdmin.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_indexHtmlTwigUsersAdmin.png" alt="Capture d'écran de la modification du fichier index.html.twig dans le dossier templates/admin/users"></a>
            <p>Voici ce que cela nous donne dans le navigateur :</p>
            <a target="_blank" href="assets/img/Capture_Ecran_Page_Admin_Users.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_Page_Admin_Users.png" alt="Capture d'écran de la page Admin avec la liste des utilisateurs"></a>
                <h3>Voilà ainsi nous avons une page avec toutes les redirections pour les administrateurs.</h3>
        </div>
    </div>
</div>