<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page13" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">13 - Accès des données et création de la page détails des produits
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/ANhUSINw8Q4?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="13 - Accès aux données - création de la page détails des produits (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="detailsProductsPageCreate" class="fw-bolder mt-4">13.1 - Création de la page détails des produits</h3>
            <p>Nous allons créer la page des détails des produits et utiliser la structure relationnelle des données pour notre projet.
            <p>içi nous avons téléchargé 9 images que nous avons placé dans le répertoire "public/assets/uploads/products/mini"</p>
            <div class="w-50 mx-auto">
                <a target="_blank" href="assets/img/Capture_Dossier_miniPhotos.png">
                <img class="w-50 pe-3 py-3 my-1" src="assets/img/Capture_Dossier_miniPhotos.png" alt="Capture d'écran du dossier public/assets/uploads/products/mini"></a>
            </div>
            <p>Dans la table "Images" de PhpMyAdmin, vérifiez les données de la colonne "name" et modifiez les noms d'images que vous avez téléchargé au préalable</p>
            <p>Nous allons commencer par modifier le fichier "ProductsController.php" situé dans le répertoire "src/Controller :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller;


    use App\Repository\ImagesRepository;
    use App\Repository\ProductsRepository;
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

        #[Route('/{id}-{slug}', name: 'details')]
        public function details($id, $slug, ImagesRepository $imagesRepository, ProductsRepository $productsRepository): Response
        {
            // Récupère les données du produit en utilisant le slug
            $products = $productsRepository->findOneBy(['slug' => $slug]);

            // Récupère les données de l'image associée au produit
            $images = $imagesRepository->findOneBy(['products' => $products]);

            // Passe les données du produit et de l'image à la vue
            return $this->render('products/details.html.twig', [
                'product' => $products,
                'images' => $images,
            ]);
        }
    }
                    </code>
                </pre>
            </div>
            <p>Cela nous donne un code comme l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_ProductsController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_ProductsController.png" alt="Capture d'écran de la modification du fichier ProductsController.php"></a>
            <p>Maintenant nous allons modifier le lien pour voir le détail des produits dans le fichier "list.html.twig" situé dans le répertoire "templates/categories"</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_listHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_listHtmlTwig.png" alt="Capture d'écran de la modification du fichier list.html.twig"></a>
            <p>Ensuite nous modifierons le fichier "details.html.twig" dans le dossier "templates/products" et voici ce que l'on obtient :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_detailsHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_detailsHtmlTwig.png" alt="Capture d'écran de la modification du fichier details.html.twig"></a>
            <h3>Vous pouvez styliser votre page comme vous le souhaitez !</h3>
        </div>
    </div>
</div>