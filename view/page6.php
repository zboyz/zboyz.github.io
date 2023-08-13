<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page6" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">6 - Optimisation des entités et DataFixtures
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/JVVeBiewhNg?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="6 - Optimisation des entités et DataFixtures (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div> 
            <h3 id="entityOptimisation" class="fw-bolder mt-4">6.1 - Optimisation des entités</h3>
            <p>Dans ce chapître, nous allons optimiser les entités et générer du contenu de test au moyen des DataFixtures.</p>
            <p>Les entités, que nous avons créées, contiennent des informations redondantes qui peuvent être optimisées. Nous allons également ajouter des slugs dans les entités qui peuvent le nécessiter.</p>
            <p>Nous retrouvons différentes propriétés identiques dans différentes entités, comme created_at par exemple, qui se trouve dans les entités "Users.php", "Products.php", "Orders.php" et "Coupons.php". On y trouve également à chaque fois les accesseurs getCreatedAt et setCreatedAt.
                Nous aurons la possibilité de limiter ces redondances en sortant ce code dans un Trait.</p>
            <p>Nous allons créer un dossier nommé "Trait.php" dans le répertoire "src/Entity", dans ce dossier nous créerons un fichier nommé "CreateAtTrait.php"</p>
            <p>Veuillez retirer du fichier "Coupons" dans le répertoire "src/Entity" les lignes complètes :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;
    public function getCreatedAt(): ?\DateTimeImmutable
    {
    return $this->created_at;
    }
    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
    $this->created_at = $created_at;
    return $this;
    }
                    </code>
                </pre>
            </div>
            <p>Collez ces lignes dans le fichier "CreatedAtTrait.php" comme suite :</p>
            <a target="_blank" href="assets/img/Capture_CreatedAtTrait.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_CreatedAtTrait.png" alt="Capture d'écran pour la création du fichier CreatedAtTrait.php"></a>
            <p>Puis dans le fichier "Coupons.php" veuillez rentrer cette ligne de code au début de la classe :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">use CreatedAtTrait;</span>
                </li>
            </ul>
            <a target="_blank" href="assets/img/Capture_CreatedAtTrait_Coupons.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_CreatedAtTrait_Coupons.png" alt="Capture d'écran pour la modification du fichier Coupons.php"></a>
            <p>Faire exactement la même chose avec les fichiers "Orders.php", "Products.php", "Users.php".</p>
            <p>Rajouter la ligne de code suivante dans les fichiers "Orders.php", "Products.php", "Coupons.php" et "Users.php" si il n'est pas dans le __construct :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">$this->created_at = new \DateTimeImmutable();</span>
                </li>
            </ul>
            <p>Voici à quoi cela ressemblera après modification :</p>
            <a target="_blank" href="assets/img/Capture_This_CreatedAt.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_This_CreatedAt.png" alt="Capture d'écran pour la modification du __construct"></a>
            <p>Nous allons faire pareil pour les slugs. Nous allons créer un fichier nommé "SlugTrait.php" dans le dossier "src/Entity/Trait"</p>
            <a target="_blank" href="assets/img/Capture_SlugTrait.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_SlugTrait.png" alt="Capture d'écran pour la création du fichier SlugTrait.php"></a>
            <p>Maintenant nous allons rentrer la ligne de code <span class="text-info bg-dark px-2 pb-1">use SlugTrait;</span> dans les fichiers "Categories.php" et "Products.php" en dessous de la ligne <span class="text-info bg-dark px-2 pb-1">use CreatedAtTrait;</span></p>
            <p>Nous allons créer un make:migrate avec la commande dans le terminal :<span class="text-info bg-dark px-2 pb-1">symfony console make:migration</span></p>
            <p>Puis nous allons le sauvegarder dans notre base de données en tapant la commande dans le terminal :<span class="text-info bg-dark px-2 pb-1">symfony console doctrine:migrations:migrate</span></p>
            <a target="_blank" href="assets/img/Capture_Migration_Slug.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Migration_Slug.png" alt="Capture d'écran pour la modification de la base de données"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="dataFixtures" class="fw-bolder mt-4">6.2 - Mise en place des DataFixtures</h3>
            <p>Pour pouvoir générer des données fictives pour la base de données, nous allons installer le composant orm-fixtures dans notre projet au moyen de la commande suivante :
                <span class="text-info bg-dark px-2 pb-1">composer require --dev orm-fixtures</span>
            </p>
            <p>
                Ce composant a créé un dossier "DataFixtures" dans le dossier "src", que nous allons supprimer par la suite, mais pas tout de suite.</p>
            <p>Afin de générer du contenu aléatoire, nous allons installer le composant fakerphp au moyen de la commande :
                <span class="text-info bg-dark px-2 pb-1">composer require fakerphp/faker</span>
            </p>
            <p>Une fois ces deux composants installés nous allons nous occuper de l'entity "Categories"</p>
            <p>Tapez la ligne de commande : <span class="text-info bg-dark px-2 pb-1">symfony console make:fixtures CategoriesFixtures</span></p>
            <p>Cette commande a créé un dossier nommé "CategoriesFixtures" dans le répertoire "src"</p>
            <a target="_blank" href="assets/img/Capture_CategoriesFixtures.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_CategoriesFixtures.png" alt="Capture d'écran pour la modification du fichier CategoriesFixtures"></a>
            <p>Vous devez rajouter une ligne de code dans le fichier "Categories.php" situé dans le dossier "src/Entity", afin qu'il puisse supprimer les clés étrangères, ce qui donne ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Cascade_Categories.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_Cascade_Categories.png" alt="Capture d'écran pour la modification du fichier Categories.php"></a>
            <p>Nous pouvons supprimer maintenant le fichier "AppFixtures.php" situé dans le dossier "src/DataFixtures"</p>
            <p>Nous pouvons lancer un make:migration et un make:migrations:migrate avec la méthode Doctrine en tapant ces trois lignes de commande dans le terminal :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">symfony console make:migration</span></li>
                <li><span class="text-info bg-dark px-2 pb-1">symfony console doctrine:migrations:migrate</span></li>
            </ul>
            <p>Enfin nous pouvons écrire cette ligne de commande afin de loader les dataFixtures :<br><span class="text-info bg-dark px-2 pb-1">symfony console doctrine:fixtures:load --no-interaction</span></p>
            <p>Voici ce que cela donne dans PHPMyAdmin :</p>
            <a target="_blank" href="assets/img/Capture_PHPAdmin1.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_PHPAdmin1.png" alt="Capture d'écran de la table Categories dans PHPMyAdmin"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="UsersdataFixtures" class="fw-bolder mt-4">6.3 - Mise en place des DataFixtures pour l'entité "Users"</h3>
            <p>Tapez ces lignes de commande dans le terminal pour créer les dataFixtures des entités "Users", "Products", "Images" :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">symfony console make:fixtures UsersFixtures</span></li>
                <li><span class="text-info bg-dark px-2 pb-1">symfony console make:fixtures ProductsFixtures</span></li>
                <li><span class="text-info bg-dark px-2 pb-1">symfony console make:fixtures ImagesFixtures</span></li>
            </ul>
            <p>Ces commandes ont créé 3 autres fichiers "UsersFixtures.php", "ProductsFixtures.php" et "ImagesFixtures.php" dans le dossier "src/DataFixtures"</p>
            <p>Nous allons modifier le fichier "UsersFixtures" et voilà ce que cela donne en image :</p>
            <a target="_blank" href="assets/img/Capture_Modification_UsersFixtures.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_UsersFixtures.png" alt="Capture d'écran modification du fichier UsersFixtures.php"></a>
            <p>Ensuite nous allons taper la ligne de commande dans le terminal :<br>
                <span class="text-info bg-dark px-2 pb-1">symfony console doctrine:fixtures:load --no-interaction</span>
            </p>
            <p>Nous obtenons dans PhpMyAdmin cette ligne dans l'entité "Users" :</p>
            <a target="_blank" href="assets/img/Capture_PhpMyAdmin2.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_PhpMyAdmin2.png" alt="Capture d'écran de la table Users dans PHPMyAdmin"></a>
            <p>Nous allons utiliser maintenant "faker" grace à l'appel de la classe "faker"</p>
            <p>Nous obtenons la modification du fichier "UsersFixtures.php" :</p>
            <a target="_blank" href="assets/img/Capture_Modification_UsersFixtures2.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_UsersFixtures2.png" alt="Capture d'écran modification du fichier UsersFixtures.php"></a>
            <p>Puis nous pouvons écrire cette ligne de commande afin de loader les dataFixtures :<br><span class="text-info bg-dark px-2 pb-1">symfony console doctrine:fixtures:load --no-interaction</span></p>
            <p>Voici ce que cela donne dans PHPMyAdmin :</p>
            <a target="_blank" href="assets/img/Capture_PHPAdmin2.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_PHPAdmin2.png" alt="Capture d'écran de la table Users dans PHPMyAdmin"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="ProductsdataFixtures" class="fw-bolder mt-4">6.4 - Mise en place des DataFixtures pour les entités "Products" et "Images"</h3>
            <p>Alors tout d'abord nous allons modifier le fichier "CategoriesFixtures.php" situé dans le répertoire "src/DataFixtures" comme suite :</p>
            <a target="_blank" href="assets/img/Capture_Modification_CategoriesFixtures2.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_CategoriesFixtures2.png" alt="Capture d'écran modification du fichier CategoriesFixtures.php"></a>
            <p>Puis ensuite nous allons modifier le fichier "ProductsFixtures.php" situé dans le répertoire "src/DataFixtures" comme l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_ProductsFixtures1.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_ProductsFixtures1.png" alt="Capture d'écran modification du fichier ProductsFixtures.php"></a>
            <p>Puis nous allons modifier le fichier "ImagesFixtures.php" situé dans le répertoire "src/DataFixtures" comme nous le montre l"image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_ImagesFixtures1.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Modification_ImagesFixtures1.png" alt="Capture d'écran modification du fichier ImagesFixtures.php"></a>
            <p>Enfin nous pouvons maintenant loader notre base de données avec toutes les informations préparées en amont grâce aux dataFixtures.</p>
            <p>Nous allons taper la ligne de commande dans le terminal :<br>
                <span class="text-info bg-dark px-2 pb-1">symfony console doctrine:fixtures:load --no-interaction</span>
            </p>
            <p>Nous obtenons dans PhpMyAdmin le changement dans l'entité "Products" :</p>
            <a target="_blank" href="assets/img/Capture_PhpMyAdmin3.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_PhpMyAdmin3.png" alt="Capture d'écran de la table Products dans PHPMyAdmin"></a>
            <p>Puis nous obtenons dans PhpMyAdmin le changement dans l'entité "Images" :</p>
            <a target="_blank" href="assets/img/Capture_PhpMyAdmin4.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_PhpMyAdmin4.png" alt="Capture d'écran de la table Images dans PHPMyAdmin"></a>
            <h3>Voilà, nous pouvons passer à la suite de notre création !!!</h3>
        </div>
    </div>
</div>