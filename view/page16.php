<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page16" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">16 - Création du formulaire d'ajout de produits
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/pCQmK56sr7c?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="16 - Création du formulaire d&#39;ajout de produits (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="formCreateAddModifProducts" class="fw-bolder mt-4">16.1 - Création des formulaires d'ajout et de modification de produits</h3>
            <p> Nous mettons en place l'administration des produits en créant le formulaire qui servira pour l'ajout mais aussi la modification de produits pour notre projet</p>
            <p>Avec le terminal nous allons taper cette commande :</p>
            <p><code class="text-info bg-dark px-2 pb-1">symfony console make:form</code></p>
            <a target="_blank" href="assets/img/Capture_Creation_Form_Products.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Form_Products.png" alt="Capture d'écran de la création d'un formulaire pour les produits"></a>
            <p>Cette commande a créé un fichier "ProductsFormType.php" dans le dossier "src/Form que nous irons modifier plus tard.</p>
            <p>Dans le répertoire "templates/admin/products", nous allons créer un nouveau fichier nommé "add.html.twig", nous y insèrerons ce code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_addHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_addHtmlTwig2.png" alt="Capture d'écran de la création du fichier add.html.twig"></a>
            <p>Ensuite dans le répertoire "templates/admin/products", nous allons créer un nouveau fichier nommé "edit.html.twig", nous y insèrerons ce code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_editHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_editHtmlTwig.png" alt="Capture d'écran de la création du fichier edit.html.twig"></a>
            
            <p>Pour avoir un style de bootstrap pour notre formulaire, nous irons modifier le fichier "yaml.twig" dans le répertoire "config/packages".</p>
            <p>Nous y ajouterons ce code <code class="text-info bg-dark px-2 pb-1">    form_themes: ['bootstrap_5_layout.html.twig']</code>, afin d'avoir un style de formulaire plus beau visuellement.</p>
            <p>Voilà à quoi ressemblera le fichier "yaml.twig" après modification :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_yamlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_yamlTwig.png" alt="Capture d'écran de la modification du fichier yaml.twig"></a>
        </div>
        <hr class="my-4">
        <div>
            <h3 id="addModifControllerCreate" class="fw-bolder mt-4">16.2 - Création des contrôleurs d'ajout et de modification des produits</h3>
            <p>Nous allons modifier le fichier "ProductsFormType.php" que nous avons créer à l'aide de Symfony un peu plus tôt.</p>
            <p>Dans notre fichier nous allons modifier les labels et le select de "catégorie" en y ajoutant des lignes de codes comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_ProductsFormType.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_ProductsFormType.png" alt="Capture d'écran de la modification du fichier ProductsFormType.php"></a>
            <p>Ils nous reste à modifier le contrôleur de l'ajout et de modifcation des produits qui se situe dans le fichier "ProductsController.php" qui lui est à l'intérieur du répertoire "src/Controller/Admin"</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller\Admin;

    use App\Entity\Images;
    use App\Entity\Products;
    use App\Form\ProductsFormType;
    use App\Repository\ProductsRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\String\Slugger\SluggerInterface;

    #[Route('/admin/produits', name: 'admin_products_')]
    class ProductsController extends AbstractController
    {
        #[Route('/', name: 'index')]
        public function index(ProductsRepository $productsRepository): Response
        {
            $produits = $productsRepository->findAll();
            return $this->render('admin/products/index.html.twig', compact('produits'));
        }

        #[Route('/ajout', name: 'add')]
        public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
        {
            $this->denyAccessUnlessGranted('ROLE_ADMIN');

            //On crée un "nouveau produit"
            $product = new Products();

            // On crée le formulaire
            $productForm = $this->createForm(ProductsFormType::class, $product);

            // On traite la requête du formulaire
            $productForm->handleRequest($request);

            //On vérifie si le formulaire est soumis ET valide
            if($productForm->isSubmitted() && $productForm->isValid()){

                // On génère le slug
                $slug = $slugger->slug($product->getName());
                $product->setSlug($slug);

                // On stocke dans la base de données
                $em->persist($product);
                $em->flush();

                $this->addFlash('success', 'Produit ajouté avec succès');

                // On redirige
                return $this->redirectToRoute('admin_products_index');
            }


            // return $this->render('admin/products/add.html.twig',[
            //     'productForm' => $productForm->createView()
            // ]);

            return $this->renderForm('admin/products/add.html.twig', compact('productForm'));
            // ['productForm' => $productForm]
        }

        #[Route('/edition/{id}', name: 'edit')]
        public function edit(Products $product, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
        {
            // On vérifie si l'utilisateur peut éditer avec le Voter
            $this->denyAccessUnlessGranted('PRODUCT_EDIT', $product);

            // On crée le formulaire
            $productForm = $this->createForm(ProductsFormType::class, $product);

            // On traite la requête du formulaire
            $productForm->handleRequest($request);

            //On vérifie si le formulaire est soumis ET valide
            if($productForm->isSubmitted() && $productForm->isValid()){
                
                // On génère le slug
                $slug = $slugger->slug($product->getName());
                $product->setSlug($slug);

                // On stocke
                $em->persist($product);
                $em->flush();

                $this->addFlash('success', 'Produit modifié avec succès');

                // On redirige
                return $this->redirectToRoute('admin_products_index');
            }


            return $this->render('admin/products/edit.html.twig',[
                'productForm' => $productForm->createView(),
                'product' => $product
            ]);

            // return $this->renderForm('admin/products/edit.html.twig', compact('productForm'));
            // ['productForm' => $productForm]
        }

        #[Route('/suppression/{id}', name: 'delete')]
        public function delete(Products $product): Response
        {
            // On vérifie si l'utilisateur peut supprimer avec le Voter
            $this->denyAccessUnlessGranted('PRODUCT_DELETE', $product);

            return $this->render('admin/products/index.html.twig');
        }

    }
                    </code>
                </pre>
            </div>
            <p>Cela nous donne un fichier comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_ProductsControllerAdmin.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_ProductsControllerAdmin.png" alt="Capture d'écran de la modification du fichier ProductsController.php dans le dossier src/Controller/Admin"></a>
            <p>Il nous reste plus qu'à créer un fichier "_form.html.twig" dans le répertoire "templates/admin/products" et y insérer ce code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_Products_formHtmltwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_Products_formHtmltwig.png" alt="Capture d'écran de la création du fichier _form.html.twig dans le dossier templates/admin/products"></a>
            <h3>Nous avons pu voir comment créer un formulaire avec Symfony et changer les champs.</h3>
        </div>
    </div>
</div>