<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page17" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">17 - Upload et gestion d'images multiples
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/axbLC9PqzfE?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="17 - Upload et gestion d&#39;images multiples (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="uploadImages" class="fw-bolder mt-4">17.1 - Upload des images dans notre projet</h3>
            <p>Nous ajouterons l'envoi des images multiples et leur gestion pour notre projet.</p>
            <p>Tout d'abord nous allons créer un fichier "PictureService.php" dans le répertoire "src/Service".</p>
            <p>Nous allons vérifier si le dossier "public/assets/uploads" existe et contient bien 3 images que nous avons téléchargé ultérieurement lors de la création des vues du produit.</p>
            <p>Si ce n'est pas le cas, alors téléchargezr 3 images d'écrans et placer les dans ce dossier.</p>
            <p>Dans les paramètres du fichier "services.yaml" situé dans le répertoire "config" rajoutez cette ligne de code, faites attention à l'indentation :<br>
            <code class="text-info bg-dark px-2 pb-1">    images_directory: '%kernel.project_dir%/public/assets/uploads/'</code></p>
            <p>Voici ce que donne le fichier après modification :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_servicesYaml.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Fichier_servicesYaml.png" alt="Capture d'écran de la modification du fichier services.yaml"></a>
            <p>Vous pouvez aller voir le tutoriel sur les manipulations des images en PHP sur ce lien :</p>
            <p><a href="https://www.youtube.com/watch?v=yFbYcgIUdqU&list=PLBq3aRiVuwyzPl8lh6lrdBXBnSpjLKwZi&index=17" target="_blank">https://www.youtube.com/watch?v=yFbYcgIUdqU&list=PLBq3aRiVuwyzPl8lh6lrdBXBnSpjLKwZi&index=17</a></p>
            <p>Nous allons ajouter au fichier "PictureService.php" qui se trouve dans le répertoire "src/Service" ce code ci-dessous :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Service;

    use Exception;
    use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
    use Symfony\Component\HttpFoundation\File\UploadedFile;

    class PictureService
    {
        private $params;

        public function __construct(ParameterBagInterface $params)
        {
            $this->params = $params;
        }

        public function add(UploadedFile $picture, ?string $folder = '', ?int $width = 250, ?int $height = 250)
        {
            // On donne un nouveau nom à l'image
            $fichier = md5(uniqid(rand(), true)) . '.webp';

            // On récupère les infos de l'image
            $picture_infos = getimagesize($picture);

            if($picture_infos === false){
                throw new Exception('Format d\'image incorrect');
            }

            // On vérifie le format de l'image
            switch($picture_infos['mime']){
                case 'image/png':
                    $picture_source = imagecreatefrompng($picture);
                    break;
                case 'image/jpeg':
                    $picture_source = imagecreatefromjpeg($picture);
                    break;
                case 'image/webp':
                    $picture_source = imagecreatefromwebp($picture);
                    break;
                default:
                    throw new Exception('Format d\'image incorrect');
            }

            // On recadre l'image
            // On récupère les dimensions
            $imageWidth = $picture_infos[0];
            $imageHeight = $picture_infos[1];

            // On vérifie l'orientation de l'image
            switch ($imageWidth <=> $imageHeight){
                case -1: // portrait
                    $squareSize = $imageWidth;
                    $src_x = 0;
                    $src_y = ($imageHeight - $squareSize) / 2;
                    break;
                case 0: // carré
                    $squareSize = $imageWidth;
                    $src_x = 0;
                    $src_y = 0;
                    break;
                case 1: // paysage
                    $squareSize = $imageHeight;
                    $src_x = ($imageWidth - $squareSize) / 2;
                    $src_y = 0;
                    break;
            }

            // On crée une nouvelle image "vierge"
            $resized_picture = imagecreatetruecolor($width, $height);

            imagecopyresampled($resized_picture, $picture_source, 0, 0, $src_x, $src_y, $width, $height, $squareSize, $squareSize);

            $path = $this->params->get('images_directory') . $folder;

            // On crée le dossier de destination s'il n'existe pas
            if(!file_exists($path . '/mini/')){
                mkdir($path . '/mini/', 0755, true);
            }

            // On stocke l'image recadrée
            imagewebp($resized_picture, $path . '/mini/' . $width . 'x' . $height . '-' . $fichier);

            $picture->move($path . '/', $fichier);

            return $fichier;
        }

        public function delete(string $fichier, ?string $folder = '', ?int $width = 250, ?int $height = 250)
        {
            if($fichier !== 'default.webp'){
                $success = false;
                $path = $this->params->get('images_directory') . $folder;

                $mini = $path . '/mini/' . $width . 'x' . $height . '-' . $fichier;

                if(file_exists($mini)){
                    unlink($mini);
                    $success = true;
                }

                $original = $path . '/' . $fichier;

                if(file_exists($original)){
                    unlink($original);
                    $success = true;
                }
                return $success;
            }
            return false;
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voilà l'image du fichier que vous devriez avoir après le rajout du code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_PictureService.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_PictureService.png" alt="Capture d'écran de la création du fichier PictureService.php"></a>
            
            <p>Nous allons utiliser la bibliothèque GD qui est requise pour les fonctions de manipulation d’images, mais elle n’est pas activée par défaut.</p>
            <p>Si la bibliothèque GD n’est pas activée, localisez et ouvrez le fichier php.ini dans votre éditeur.
                Recherchez la ligne <span class="text-info bg-dark px-2 py-1 my-1">;extension=gd</span> et supprimez le point-virgule pour activer l’extension.
                Enregistrez le fichier pour que les modifications prennent effet.</p>
            <div class="d-flex justify-content-center">
                <a target="_blank" href="assets/img/Capture_PHP_Extension_gd.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_PHP_Extension_gd.png" alt="Capture d'écran de la création du fichier PictureService.php"></a>
            </div>
            <p>Nous allons maintenant modifier notre formulaire dans le fichier "ProductsFormType.php" dans le répertoire "src/Form"</p>
            <p>Nous y ajouterons ces lignes de code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    ->add('images', FileType::class, [
        'label' => false,
        'multiple' => true,
        'mapped' => false,
        'required' => false,
    ])
                    </code>
                </pre>
            </div>
            <p>Voici le fichier dans sa totalité :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_ProductsFormType2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_ProductsFormType2.png" alt="Capture d'écran de la modification du fichier ProductsFormType.php"></a>
            <p>Nous allons rajouter maintenant ce petit bout de code dans le fichier "Products.php" dans le dossier "src/Entity" :<br>
            <code class="text-info bg-dark px-2 pb-1">, cascade:['persist'])]</code></p>
            <p>Ce qui nous donne ceci :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_Products2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_Products2.png" alt="Capture d'écran de la modification du fichier Products.php"></a>
        </div>
        <hr class="my-4">
        <div>
            <h3 id="gestionImages" class="fw-bolder mt-4">17.2 - Gestion des images côté Admin</h3>
                <p>Nous allons modifier le fichier "list.html.twig" dans le répertoire "templates/categories" comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_listHtmlTwig3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_listHtmlTwig3.png" alt="Capture d'écran de la modification du fichier list.html.twig"></a>
            <p>Nous allons modifier le fichier "_form.html.twig" dans le dossier "templates/admin/products" comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier__formHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier__formHtmlTwig.png" alt="Capture d'écran de la modification du fichier _form.html.twig"></a>
            <p>Maintenant nous allons créer un fichier "images.js" dans le dossier "public/assets/js" et on va y ajouter ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    let links = document.querySelectorAll("[data-delete]");

    // On boucle sur les liens
    for(let link of links){
        // On met un écouteur d'évènements
        link.addEventListener("click", function(e){
            // On empêche la navigation
            e.preventDefault();

            // On demande confirmation
            if(confirm("Voulez-vous supprimer cette image ?")){
                // On envoie la requête ajax
                fetch(this.getAttribute("href"), {
                    method: "DELETE",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({"_token": this.dataset.token})
                }).then(response => response.json())
                .then(data => {
                    if(data.success){
                        this.parentElement.remove();
                    }else{
                        alert(data.error);
                    }
                })
            }
        });
    }
                    </code>
                </pre>
            </div>
            <p>Nous obtenons ce fichier comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_ImagesJS.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_ImagesJS.png" alt="Capture d'écran de la création du fichier images.js"></a>
            <p>Nous allons modifier le fichier "edit.html.twig" dans le dossier "templates/admin/products" et y ajouter à la fin du fichier ce code-ci :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_editHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_editHtmlTwig.png" alt="Capture d'écran de la modification du fichier edit.html.twig"></a>
            <p>Enfin nous allons modifier le fichier "ProductsController.php" qui se situe dans le répertoire "src/Controller/Admin" avec ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller\Admin;

    use App\Entity\Images;
    use App\Entity\Products;
    use App\Form\ProductsFormType;
    use App\Repository\ImagesRepository;
    use App\Repository\ProductsRepository;
    use App\Service\PictureService;
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
        public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger, PictureService $pictureService): Response
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
                // On récupère les images
                $images = $productForm->get('images')->getData();
                
                foreach ($images as $image) {
                    // On définit le dossier de destination
                    $folder = 'products';

                    // On appelle le service d'ajout
                    $fichier = $pictureService->add($image, $folder, 300, 300);

                    $img = new Images();
                    $img->setName($fichier);
                    $product->addImage($img);
                }

                // On génère le slug
                $slug = $slugger->slug($product->getName());
                $product->setSlug($slug);

                // On arrondit le prix 
                // $prix = $product->getPrice() * 100;
                // $product->setPrice($prix);

                // On stocke
                $em->persist($product);
                $em->flush();

                $this->addFlash('success', 'Produit ajouté avec succès');

                // On redirige
                return $this->redirectToRoute('admin_products_index');
            }


            return $this->render('admin/products/add.html.twig',[
                'productForm' => $productForm->createView()
            ]);

            // return $this->renderForm('admin/products/add.html.twig', compact('productForm'));
            // ['productForm' => $productForm]
        }

        #[Route('/edition/{id}', name: 'edit')]
        public function edit($id, Products $product, Request $request, EntityManagerInterface $em, ProductsRepository $productsRepository, ImagesRepository $imagesRepository, SluggerInterface $slugger, PictureService $pictureService): Response
        {
            // On vérifie si l'utilisateur peut éditer avec le Voter
            $this->denyAccessUnlessGranted('PRODUCT_EDIT', $product);

            // On divise le prix par 100
            // $prix = $product->getPrice() / 100;
            // $product->setPrice($prix);

            // On crée le formulaire
            $productForm = $this->createForm(ProductsFormType::class, $product);

            // On traite la requête du formulaire
            $productForm->handleRequest($request);

            //On vérifie si le formulaire est soumis ET valide
            if($productForm->isSubmitted() && $productForm->isValid()){
                // On récupère les images
                $images = $productForm->get('images')->getData();

                foreach($images as $image){
                    // On définit le dossier de destination
                    $folder = 'products';
                    
                    // On appelle le service d'ajout
                    $fichier = $pictureService->add($image, $folder, 300, 300);

                    $img = new Images();
                    $img->setName($fichier);
                    $product->addImage($img);
                }

                // On génère le slug
                $slug = $slugger->slug($product->getName());
                $product->setSlug($slug);

                // On arrondit le prix 
                // $prix = $product->getPrice() * 100;
                // $product->setPrice($prix);

                // On stocke
                $em->persist($product);
                $em->flush();

                $this->addFlash('success', 'Produit modifié avec succès');

                // On redirige
                return $this->redirectToRoute('admin_products_index');
            }

            // return $this->render('admin/products/edit.html.twig',[
            //     'productForm' => $productForm->createView(),
            //     'product' => $product,
            //     'images' => $images
            // ]);
            // Récupère les données du produit en utilisant le slug
            $product = $productsRepository->findOneBy(['id' => $id]);

            // Récupère les données de l'image associée au produit
            $images = $imagesRepository->findOneBy(['products' => $product]);

            return $this->renderForm('admin/products/edit.html.twig', compact('productForm', 'product', 'images'));
            // ['productForm' => $productForm]
        }


        #[Route('/suppression/{id}', name: 'delete')]
        

        public function delete(Products $product): Response
        {
            // On vérifie si l'utilisateur peut supprimer avec le Voter
            $this->denyAccessUnlessGranted('PRODUCT_DELETE', $product);

            return $this->render('admin/products/index.html.twig');
        }

        #[Route('/suppression/image/{id}', name: 'delete_image', methods: ['DELETE'])]
        public function deleteImage(Images $image, Request $request, EntityManagerInterface $em, PictureService $pictureService): JsonResponse
        {
            // On récupère le contenu de la requête
            $data = json_decode($request->getContent(), true);

            if($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])){
                // Le token csrf est valide
                // On récupère le nom de l'image
                $nom = $image->getName();

                if($pictureService->delete($nom, 'products', 300, 300)){
                    // On supprime l'image de la base de données
                    $em->remove($image);
                    $em->flush();

                    return new JsonResponse(['success' => true], 200);
                }
                // La suppression a échoué
                return new JsonResponse(['error' => 'Erreur de suppression'], 400);
            }

            return new JsonResponse(['error' => 'Token invalide'], 400);
        }

    }
                    </code>
                </pre>
            </div>
            <p>Voilà le fichier que l'on obtient dans notre projet :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_ProductsControllerAdmin2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_ProductsControllerAdmin2.png" alt="Capture d'écran de la modification du fichier ProductsController.php dans le répertoire src/Controller/Admin"></a>
            <h3>Ainsi l'administrateur pourra ajouter, modifier et supprimer les images qu'il souhaite.</h3>
        </div>
    </div>
</div>