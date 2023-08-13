<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page15" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">15 - Mise en place des permissions utilisateurs
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/DoYRLFMxa34?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="15 - Mise en place des permissions utilisateurs avec les voters (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="usersPermCreate" class="fw-bolder mt-4">15.1 - Création des permissions utilisateurs</h3>
            <p>Nous mettons en place la gestion des permissions utilisateurs en utilisant les <span class="fst-italic fw-bolder">voters</span> pour notre projet.</p>
            <p>Nous allons placer des rôles différents pour des types d'utilisateurs que nous créerons pour la navigation dans le site.</p>
            <p>Nous allons choisir au hasard un utilisateur dans notre base de données et lui assigné un rôle par exemple ["ROLE_PRODUCT_ADMIN"]</p>
            <a target="_blank" href="assets/img/Capture_Modification_Users_BDD.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Users_BDD.png" alt="Capture d'écran de l'attribution d'un rôle à un utilisateur"></a>
            <p>Nous avons déjà créé, au début du tutoriel, un rôle administrateur qui lui a tous les droits et on l'avait appelé ["ROLE_ADMIN"]</p>
            <p>Nous allons déclarer les différents rôles donnés et les hierarchisés.</p>
            <p>Dans le fichier "security.yaml" situé dans le répertoire "config/packages" nous allons modifier les rôles, faites attention à l'indentation :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    access_control:
        # - { path: ^/admin/utilisateurs, roles: ROLE_ADMIN }
        - { path: ^/admin, roles: ROLE_PRODUCT_ADMIN }
        - { path: ^/profil, roles: ROLE_USER }

    role_hierarchy:
        ROLE_PRODUCT_ADMIN: ROLE_USER
        ROLE_ADMIN: ROLE_PRODUCT_ADMIN
        ROLE_SUPER_ADMIN: ROLE_ADMIN
                    </code>
                </pre>
            </div>
            <p>Nous allons créer un fichier "ProductsController.php" dans le répertoire "src/Controller/Admin" et y mettre ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller\Admin;

    use App\Repository\UsersRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    #[Route('/admin/produits', name: 'admin_products_')]
    class ProductsController extends AbstractController
    {
        #[Route('/', name: 'index')]
        public function index(UsersRepository $usersRepository): Response
        {
            $users = $usersRepository->findBy([], ['firstname' => 'asc']);
            return $this->render('admin/products/index.html.twig', compact('users'));
        }
    }
                    </code>
                </pre>
            </div>
            <p>Puis nous allons créer un nouveau dossier "products" dans le répertoire "templates/admin" et nous créerons un nouveau fichier "index.html.twig", 
                nous y insèrerons un code comme l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture__Creation_Fichier_indexHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture__Creation_Fichier_indexHtmlTwig.png" alt="Capture création du fichier index.html.twig dans le dossier templates/admin/products"></a>
        </div>
        <hr class="my-4">
        <div>
            <h3 id="votersCreate" class="fw-bolder mt-4">15.2 - Création des voters</h3>
            <p>Nous allons créer un dossier "Voter" dans le dossier "src/Security", puis un nouveau fichier "ProductsVoter.php" et ajouter ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Security\Voter;

    use App\Entity\Products;
    use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
    use Symfony\Component\Security\Core\Authorization\Voter\Voter;
    use Symfony\Component\Security\Core\Security;
    use Symfony\Component\Security\Core\User\UserInterface;

    class ProductsVoter extends Voter
    {
        const EDIT = 'PRODUCT_EDIT';
        const DELETE = 'PRODUCT_DELETE';

        private $security;

        public function __construct(Security $security)
        {
            $this->security = $security;
        }

        protected function supports(string $attribute, $product): bool
        {
            if(!in_array($attribute, [self::EDIT, self::DELETE])){
                return false;
            }
            if(!$product instanceof Products){
                return false;
            }
            return true;

            // L'intérieur de la fonction peut être écrite comme ci dessous :
            // return in_array($attribute, [self::EDIT, self::DELETE]) && $product instanceof Products;
        }

        protected function voteOnAttribute($attribute, $product, TokenInterface $token): bool
        {
            // On récupère l'utilisateur à partir du token
            $user = $token->getUser();

            if(!$user instanceof UserInterface) return false;

            // On vérifie si l'utilisateur est admin
            if($this->security->isGranted('ROLE_ADMIN')) return true;

            // On vérifie les permissions
            switch($attribute){
                case self::EDIT:
                    // On vérifie si l'utilisateur peut éditer
                    return $this->canEdit();
                    break;
                case self::DELETE:
                    // On vérifie si l'utilisateur peut supprimer
                    return $this->canDelete();
                    break;
            }
        }

        private function canEdit(){
            return $this->security->isGranted('ROLE_PRODUCT_ADMIN');
        }
        private function canDelete(){
            return $this->security->isGranted('ROLE_ADMIN');
        }
    }
                    </code>
                </pre>
            </div>
            <p>Nous obtiendrons un fichier tel que nous le montre l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture__Creation_Fichier_ProductsVoter.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture__Creation_Fichier_ProductsVoter.png" alt="Capture création du fichier ProductsVoter.php dans le dossier src/Security/Voter"></a>
            <h3>Nous avons créé les permissions utilisateurs et défini le rôle de chacun.</h3>
        </div>
    </div>
</div>