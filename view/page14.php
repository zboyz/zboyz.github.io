<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page14" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">14 - Mise en place de la pagination sans bundle
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/Jwq-RDUv2D4?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="14 - Mise en place de la pagination sans bundle (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="paginationCreateWithoutBundle" class="fw-bolder mt-4">14.1 - Création d'une pagination sans bundle</h3>
            <p>Nous allons utiliser une requête notamment le "createQueryBuilder" afin qu'il puisse nous envoyer les données qui nous intéressent.</p>
            <p>Tapez ce nouveau code dans le fichier "ProductsRepository.php" dans le dossier "src/Repository"</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Repository;

    use App\Entity\Products;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\ORM\Tools\Pagination\Paginator;
    use Doctrine\Persistence\ManagerRegistry;

    /**
    * @method Products|null find($id, $lockMode = null, $lockVersion = null)
    * @method Products|null findOneBy(array $criteria, array $orderBy = null)
    * @method Products[]    findAll()
    * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    */
    class ProductsRepository extends ServiceEntityRepository
    {
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, Products::class);
        }

        public function findProductsPaginated(int $page, string $slug, int $limit = 6): array
        {
            $limit = abs($limit);

            $result = [];

            $query = $this->getEntityManager()->createQueryBuilder()
                ->select('c', 'p')
                ->from('App\Entity\Products', 'p')
                ->join('p.categories', 'c')
                ->where("c.slug = '$slug'")
                ->setMaxResults($limit)
                ->setFirstResult(($page * $limit) - $limit);

            $paginator = new Paginator($query);
            $data = $paginator->getQuery()->getResult();
            
            //On vérifie qu'on a des données
            if(empty($data)){
                return $result;
            }

            //On calcule le nombre de pages
            $pages = ceil($paginator->count() / $limit);

            // On remplit le tableau
            $result['data'] = $data;
            $result['pages'] = $pages;
            $result['page'] = $page;
            $result['limit'] = $limit;

            return $result;
        }

        // /**
        //  * @return Products[] Returns an array of Products objects
        //  */
        /*
        public function findByExampleField($value)
        {
            return $this->createQueryBuilder('p')
                ->andWhere('p.exampleField = :val')
                ->setParameter('val', $value)
                ->orderBy('p.id', 'ASC')
                ->setMaxResults(10)
                ->getQuery()
                ->getResult()
            ;
        }
        */

        /*
        public function findOneBySomeField($value): ?Products
        {
            return $this->createQueryBuilder('p')
                ->andWhere('p.exampleField = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult()
            ;
        }
        */
    }
                    </code>
                </pre>
            </div>
            <p>Cela nous donne le fichier modifié comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_ProductsRepository.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_ProductsRepository.png" alt="Capture de la modification du fichier ProductsRepository.php"></a>
            <p>Ensuite nous allons modifier le fichier "ProductsController.php" dans le dossier "src/Controller" comme ceci :</p>
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

        #[Route('/{slug}', name: 'details')]
        public function details($slug, ImagesRepository $imagesRepository, ProductsRepository $productsRepository): Response
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
            <p>Cela nous donne ce fichier au total :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_ProductsController3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_ProductsController3.png" alt="Capture de la modification du fichier ProductsController.php"></a>
            <p>Puis nous allons modifier le fichier "CategoriesController.php" dans le dossier "src/Controller" avec ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
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
            
            //On va chercher le numéro de page dans l'url
            $page = $request->query->getInt('page', 1);

            //On va chercher la liste des produits de la catégorie
            $products = $productsRepository->findProductsPaginated($page, $category->getSlug(), 4);

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
            <p>Cela nous donne un fichier tel que l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_CategoriesController3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_CategoriesController3.png" alt="Capture de la modification du fichier CategoriesController.php"></a>
            <p>Nous allons modifier le fichier "list.html.twig" en y rajoutant les dernières lignes comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_listHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_listHtmlTwig2.png" alt="Capture de la modification du fichier list.html.twig"></a>
            <p>Enfin nous allons créer un fichier "_pagination.html.twig" dans le dossier "templates/_partials"</p>
            <p>Dans ce fichier nous allons rajouter ce code qui suit :</p>
            <a target="_blank" href="assets/img/Capture__Creation_paginationHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture__Creation_paginationHtmlTwig.png" alt="Capture de la création du fichier _pagination.html.twig"></a>
            <h3>Voilà nous avons créé un système de pagination pour notre projet et ainsi décharger la quantité d'informations dans les pages.</h3>
        </div>
    </div>
</div>