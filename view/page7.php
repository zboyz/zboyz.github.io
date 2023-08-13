<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page7" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">7 - Création des contrôleurs
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/X_mNHTGJb5M?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="7 - Création des contrôleurs (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="controllerCreate" class="fw-bolder mt-4">7.1 - Création des contrôleurs</h3>
            <p>Nous allons créer les contrôleurs de notre projet e-commerce.
                Les contrôleurs vont servir à créer et gérer les "routes" ou les différentes adresses de notre site.
                Nous avons déjà dans notre projet le fichier "MainController.php" dans le dossier "src/Controller", voici comment il se présente :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_MainController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Fichier_MainController.png" alt="Capture d'écran du fichier MainController.php"></a>
            <p>Dans ce contrôleur, nous avons créé la route de la page d'accueil, '/', qui permet donc à notre projet d'être chargé sur une adresse de type https://mondomaine.ext
                L'attribut <code class="text-info bg-dark px-3 py-1">#[Route(…)]</code> est ici pour créer cette route et y apporter des options.</p>
            <p>Dans le cas de l'attribut <code class="text-info bg-dark px-3 py-2">#[Route('/', name: 'main')]</code> on aura :</p>
            <ul>
                <li><code class="text-info bg-dark px-3 py-1">'/'</code> qui correspond à l'adresse de notre page</li>
                <li><code class="text-info bg-dark px-3 py-1">name: 'main'</code> qui correspond au nom de notre route, un nom qui pourra être appelé depuis d'autres parties de notre code pour y faire référence.</li>
            </ul>
            <p>Dans ce contrôleur simple, la ligne <code class="text-info bg-dark px-3 py-1">return $this->render('main/index.html.twig');</code> va appeler une vue twig pour afficher du contenu.</p>
            <p>On va, par exemple, créer un contrôleur pour le profil de l'utilisateur.
                On pourrait créer les fichiers à la main sans problème,
                mais le “Maker Bundle” nous permet de créer nos contrôleurs automatiquement au moyen de la commande suivante à taper dans le terminal :</p>
            <code class="text-info bg-dark px-3 py-1">symfony console make:controller ProfileController</code>
            <p>Cela nous donne cette fenêtre du terminal :</p>
            <a target="_blank" href="assets/img/Capture__Creation_ProfileController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture__Creation_ProfileController.png" alt="Capture d'écran pour la création d'un controller Profile"></a>
            <p>Cette commande va créer :</p>
            <ul>
                <li>Un fichier "ProfileController.php" dans le dossier "src/Controller" qui sera notre contrôleur.</li>
                <li>Un fichier "index.html.twig" dans un nouveau dossier "profile" situé dans le dossier "templates" qui sera notre vue par défaut.</li>
            </ul>
            <p>Nous allons modifier ce fichier et voilà à quoi cela ressemblera :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_ProfileController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Fichier_ProfileController.png" alt="Capture d'écran pour la modification du fichier ProfileController.php"></a>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="productsControllerCreateManually" class="fw-bolder mt-4">7.2 - Création d'un contrôleur manuellement</h3>
            <p>Essayons maintenant de créer manuellement un contrôleur.</p>
            <p>Dans le dossier "src/Controller", créer un nouveau fichier nommé "ProductsController.php".</p>
            <p>Tapez ce code dans ce fichier :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code class="">
    namespace App\Controller;

    use App\Entity\Products;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/produits', name: 'products_')]
    class ProductsController extends AbstractController
    {
        #[Route('/', name: 'index')]
        public function index(): Response
        {
            return $this->render('products/index.html.twig');
        }
        #[Route('/{slug}', name: 'details')]
        public function details(Products $product): Response
        {
            return $this->render('products/details.html.twig', compact('product'));
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voici une image du code que vous devriez avoir :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_ProfileController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_ProfileController.png" alt="Capture d'écran pour la modification du fichier ProductsController.php"></a>
            <p>Puis créez un dossier "products" dans le répertoire "templates", dans ce dossier nous allons créer un nouveau fichier "index.html.twig",
                puis nous allons modifier le fichier comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_indexHtmlTwig_Products.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_indexHtmlTwig_Products.png" alt="Capture d'écran pour la modification du fichier index.html.twig du dossier templates/products"></a>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="usersControllerCreateManually" class="fw-bolder mt-4">7.3 - Création d'un contrôleur "Users" manuellement</h3>
            <p>Nous allons créer un nouveau contrôleur qui se nommera "UsersController.php" dans un nouveau dossier appelé "Admin" dans le dossier "src/Controller"</p>
            <p>Tapez ce code dans ce fichier :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller\Admin;

    use App\Repository\UsersRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/admin/utilisateurs', name: 'admin_users_')]
    class UsersController extends AbstractController
    {
        #[Route('/', name: 'index')]
        public function index(UsersRepository $usersRepository): Response
        {
            $users = $usersRepository->findBy([], ['firstname' => 'asc']);
            return $this->render('admin/users/index.html.twig', compact('users'));
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voici une image du code que vous devriez avoir :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_UsersController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_UsersController.png" alt="Capture d'écran pour la modification du fichier UsersController.php"></a>
            <p>Puis créez un dossier "admin" dans le répertoire "templates", dans ce dossier créer un nouveau dossier "users" et dans ce dossier nous allons créer un nouveau fichier "index.html.twig",
                puis nous allons modifier le fichier comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_indexHtmlTwig_Users.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_indexHtmlTwig_Users.png" alt="Capture d'écran pour la modification du fichier index.html.twig du dossier templates/admin/users"></a>
            <h3>Ainsi nous pourrons créer autant de contrôleurs que nous le souhaiterons pour notre projet.</h3>
        </div>
    </div>
</div>