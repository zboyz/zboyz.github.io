<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page20" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">20 - Gestion du panier d'achats sans bundle
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/egKFpD14580?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="20 - Gestion du panier d&#39;achats sans bundle (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="controllerCartCreate" class="fw-bolder mt-4">20.1 - Création d''un contrôleur pour les paniers d'achats</h3>
            <p>Nous allons pouvoir enfin rajouter un gestion pour les paniers d'achats d'un utilisateur manuellement.</p>
            <p>Nous allons créer un nouveau fichier "CartController.php" dans le dossier "src/Controller"</p>
            <p>Nous allons y rajouter ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller;

    use App\Entity\Products;
    use App\Repository\ProductsRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/cart', name: 'cart_')]
    class CartController extends AbstractController
    {

        #[Route('/', name: 'index')]
        public function index(ProductsRepository $productsRepository, SessionInterface $session)
        {
            $panier = $session->get('panier', []);
            
            // On initialise des variables
            $data = [];
            $total = 0;
            foreach($panier as $id => $quantity){
                $product = $productsRepository->find($id);

                $price = $product->getPrice();
                
                $data[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                
                $total += $price * $quantity;
            }
            
            return $this->render('cart/index.html.twig', compact('data', 'total'));
        }


        #[Route('/add/{id}', name: 'add')]
        public function add(Products $product, SessionInterface $session)
        {
            
            //On récupère l'id du produit
            $id = $product->getId();

            // On récupère le panier existant
            $panier = $session->get('panier', []);

            // On ajoute le produit dans le panier s'il n'y est pas encore
            // Sinon on incrémente sa quantité
            if(empty($panier[$id])){
                $panier[$id] = 1;
            }else{
                $panier[$id]++;
            }

            $session->set('panier', $panier);
            
            //On redirige vers la page du panier
            return $this->redirectToRoute('cart_index');
        }

        #[Route('/remove/{id}', name: 'remove')]
        public function remove(Products $product, SessionInterface $session)
        {
            //On récupère l'id du produit
            $id = $product->getId();

            // On récupère le panier existant
            $panier = $session->get('panier', []);

            // On retire le produit du panier s'il n'y a qu'1 exemplaire
            // Sinon on décrémente sa quantité
            if(!empty($panier[$id])){
                if($panier[$id] > 1){
                    $panier[$id]--;
                }else{
                    unset($panier[$id]);
                }
            }

            $session->set('panier', $panier);
            
            //On redirige vers la page du panier
            return $this->redirectToRoute('cart_index');
        }

        #[Route('/delete/{id}', name: 'delete')]
        public function delete(Products $product, SessionInterface $session)
        {
            //On récupère l'id du produit
            $id = $product->getId();

            // On récupère le panier existant
            $panier = $session->get('panier', []);

            if(!empty($panier[$id])){
                unset($panier[$id]);
            }

            $session->set('panier', $panier);
            
            //On redirige vers la page du panier
            return $this->redirectToRoute('cart_index');
        }

        #[Route('/empty', name: 'empty')]
        public function empty(SessionInterface $session)
        {
            $session->remove('panier');

            return $this->redirectToRoute('cart_index');
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voilà à quoi ressemble le fichier une fois le code inséré :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_CartController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_CartController.png" alt="Capture d'écran de la création du fichier CartController.php"></a>
            <p>Ensuite nous allons modifier le fichier "details.html.twig" dans le répertoire "templates/products" comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_detailsHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_detailsHtmlTwig2.png" alt="Capture d'écran de la modification du fichier details.html.twig"></a>
            <p>Puis nous allons créer un dossier "cart" dans le dossier "templates" et nous créerons un fichier nommé "index.html.twig"</p>
            <p>Nous y rajouterons ce code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_indexHtmlTwigCart.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_indexHtmlTwigCart.png" alt="Capture d'écran de la création du fichier index.html.twig dans le répertoire teplates/cart"></a>
            <p>Voici ce qu nous obtenons dans notre navigateur :</p>
            <a target="_blank" href="assets/img/Capture_Ecran_Page_Cart.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_Page_Cart.png" alt="Capture d'écran de la page cart dans notre navigateur"></a>
            <h3>Enfin s'achève notre tutoriel de notre projet E-commerce avec Symfony 6 !!!</h3>
        </div>
    </div>
</div>