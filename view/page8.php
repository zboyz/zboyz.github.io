<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page8" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">8 - Intégrer les données dans les vues
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/OG-ALaraXoo?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="8 - Intégrer les données dans les vues (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="mainIntegration" class="fw-bolder mt-4">8.1 - Intégration des données dans la page d'accueil</h3>
            <p>Avant de commencer, nous allons rajouter des lignes pour créer un nouvelle propriété "categoryOrder" dans l'entité "Categories" qui se situe dans le fichier "Categories.php" qui est dans le répertoire "src/Entity" :</p>
            <div class="w-50 mx-auto">
                <a target="_blank" href="assets/img/Capture_Modification_Fichier_Categories4.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_Categories4.png" alt="Capture d'écran de la modification du fichier Categories.php"></a>
            </div>
            <div class="w-50 mx-auto">
                <a target="_blank" href="assets/img/Capture_Modification_Fichier_Categories5.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_Categories5.png" alt="Capture d'écran de la modification du fichier Categories.php"></a>
            </div>
            <p>Ensuite faite une migration dans votre base de données en tapant ces deux lignes :</p>
            <ul>
                <li><code class="text-info bg-dark px-2 pb-1">symfony console make:migration</code></li>
                <li><code class="text-info bg-dark px-2 pb-1">symfony console doctrine:migration:migrate</code></li>
            </ul>
            <p>Nous allons modifier le fichier "MainController.php" dans le dossier "src/Controller" comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_MainController2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_MainController2.png" alt="Capture d'écran de la modification du fichier MainController.php"></a>
            <p>Nous pouvons styliser le fichier vue du fichier "index.html.twig" dans le dossier "templates/main" comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_indexHtmlTwigMain2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_indexHtmlTwigMain2.png" alt="Capture d'écran de la modification du fichier index.html.twig du répertoire templates/main"></a>
            <p>Cela nous donne dans notre site l'écran d'accueil :</p>
            <a target="_blank" href="assets/img/Capture_Ecran_Site2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_Site2.png" alt="Capture d'écran du site"></a>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="categroyIntegration" class="fw-bolder mt-4">8.2 - Intégration des données dans la page des catégories</h3>
            <p>Nous allons créer un nouveau fichier "CategoriesController.php" dans le dossier "src/Controller"</p>
            <p>Tapez le code suivant dans ce fichier :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code class="">
    namespace App\Controller;

    use App\Repository\CategoriesRepository;
    use App\Repository\ProductsRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/categories', name: 'categories_')]
    class CategoriesController extends AbstractController
    {
        #[Route('/{slug}', name: 'list')]
        public function list($slug, CategoriesRepository $categoriesRepository,  ProductsRepository $productsRepository, Request $request): Response
        {
            $category = $categoriesRepository->findOneBy(['slug' => $slug]);
        
            // On va chercher la liste des produits de la catégorie
            $products = $category->getProducts();

            return $this->render('categories/list.html.twig', compact('category','products'));
        
            // La fonction compact fait exactement la même chose que :
            //return $this->render('categories/list.html.twig', [
            //    'category' => $category,
            //    'products' => $products
            //])
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voici une capture du fichier que l'on a créé :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_CategoriesController1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_CategoriesController1.png" alt="Capture d'écran de la modification du fichier CategoriesController dans src/Controller"></a>
            <p>Maintenant nous allons créer un fichier "list.html.twig" dans un nouveau dossier "categories" dans le répertoire "templates" et nous allons ajouter ces nouvelles lignes :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_listHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_listHtmlTwig.png" alt="Capture d'écran de la création du fichier list.html.twig dans templates/categories"></a>
            <p>Dans le fichier "_nav.html.twig" qui se situe dans le dossier "templates/_partials", pour avoir un retour à notre page d'accueil il faut modifier la ligne comme ceci :</p>
            <code class="text-info bg-dark px-2 pb-1">href="{{ path('main') }}</code>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_navHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_navHtmlTwig2.png" alt="Capture d'écran de la modification du fichier _nav.html.twig dans templates/_partials"></a>
            <h3>A vous de styliser vos pages comme vous le souhaitez !</h3>
        </div>
    </div>
</div>