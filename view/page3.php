<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page3" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">3 - Création de la base de
            données
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514"
                    src="https://www.youtube.com/embed/MhVAwrujifQ?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM"
                    title="3 - Création de la base de données (Symfony 6)" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <h3 id="MCD" class="fw-bolder mt-4">3.1 - Présentation du MCD de notre projet</h3>
            <p>Voici le MCD de notre base de données que nous allons créer ensemble avec Symfony 6.</p>
            <a target="_blank" href="assets/img/Capture_MCD_e-commerce.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_MCD_e-commerce.png"
                    alt="Capture d'écran MCD de notre projet e-commerce"></a>
            <p>Vous remarquerez que certains éléments, comme dans la table "catégories" sont reliés par un parent
                donc nous créerons
                une relation interne pour cette table.</p>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="bddCreate" class="fw-bolder">3.2 - Création de la base de données</h3>
            <p>Pour créer votre base de données, vous devez taper dans votre terminal cette commande :<br>
                <span class="text-info bg-dark px-2 pb-1">symfony console doctrine:database:create</span>
            </p>
            <a target="_blank" href="assets/img/Capture_creation_bdd.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_creation_bdd.png"
                    alt="Capture d'écran commande création de la base de données"></a>
            <ul>
                <li class="fw-bolder">Création des différentes tables</li>
            </ul>
            <p>Nous commencerons par les tables dépourvues de dépendances, puis nous nous attaquerons aux tables
                plus complexes.</p>
            <a target="_blank" href="assets/img/Capture_tables1.png"><img class="w-100 h-100 py-3 my-2"
                    src="assets/img/Capture_tables1.png" alt="Capture d'écran des tables de la base de données 1"></a>
            <a target="_blank" href="assets/img/Capture_tables2.png"><img class="w-100 h-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_tables2.png" alt="Capture d'écran des tables de la base de données 2"></a>
            <a target="_blank" href="assets/img/Capture_tables3.png"><img class="w-100 h-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_tables3.png" alt="Capture d'écran des tables de la base de données 3"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityCreate" class="fw-bolder">3.3 - Création des entités</h3>
            <p>Après avoir créé la base de données, nous allons créer les entités dans notre projet, chaque entité
                correspondra à une table dans la base de données. </p>
            <p>Pour créer une entité, nous utiliserons la commande suivante dans le terminal :</p>
            <p><span class="text-info bg-dark px-2 pb-1">symfony console make:entity</span> en changeant "entity"
                par "User"</p>
            <p>Voici la création d'une première entité nommée Users, (prenez l'habitude de donner des noms d'entités
                avec la première lettre en majuscule).</p>
            <a target="_blank" href="assets/img/Capture_Creation_Entite_Users.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Creation_Entite_Users.png" alt="Capture d'écran de l'entité 'Users'"></a>
            <p>Cette commande a créé plusieurs nouveautés dans votre projet :</p>
            <ul>
                <li>Création d'un fichier Users.php dans le dossier src/Entity</li>
                <li>Création d'un fichier UsersRepository.php dans le dossier src/Repository</li>
                <li>Modification du fichier config/packages/security.yaml</li>
            </ul>
            <p>Voici le fichier Users.php qui a été créé</p>
            <a target="_blank" href="assets/img/Capture_fichier_UsersPHP.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_fichier_UsersPHP.png" alt="Capture d'écran du fichier 'Users.php'"></a>
            <div>Ces lignes :
                <ul>
                    <li><span class="text-info bg-dark px-2 pb-1">Users implements UserInterface,
                            PasswordAuthenticatedUserInterface</span>
                        va nous permettre de gérer la sécurité et l'authentification de l'utilisateur par la suite.</li>
                    <li><span class="text-info bg-dark px-2 pb-1">#[ORM\Id]</span>
                        définit la clé primaire.</li>
                    <li><span class="text-info bg-dark px-2 pb-1">#[ORM\GeneratedValue]</span>
                        définit une incrémentation automatique de la clé primaire.</li>
                    <li><span class="text-info bg-dark px-2 pb-1">#[ORM\Column(length: 180, unique: true)]</span>
                        définit la colonne e-mail qui a une longueur de 180 caractères et de type unique.</li>
                </ul>
            </div>
            <p>Pour chaque colonne il y aura les getters et setters de chaque propriétés qui sont générés
                automatiquement par Symfony</p>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityUsersCreate" class="fw-bolder">3.4 - Création des entités de la table Users</h3>
            <p>Etant donné que nous avons créé les entités "id", "email", "password" et "roles" nous continuons à créer
                le reste des entités de la table "Users"</p>
            <a target="_blank" href="assets/img/Capture_make_entity1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_make_entity1.png"
                    alt="Capture d'écran de la création des autres entités de la table Users"></a>
            <a target="_blank" href="assets/img/Capture_make_entity2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_make_entity3.png"
                    alt="Capture d'écran de la création des autres entités de la table Users"></a>
            <a target="_blank" href="assets/img/Capture_make_entity3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_make_entity3.png"
                    alt="Capture d'écran de la création des autres entités de la table Users"></a>
            <p>Nous voyons que tous les entités que nous avons créé sont maintenant dans le fichier Uses.php dans le
                repertoire src/Entity</p>
            <a target="_blank" href="assets/img/Capture_Entites_fichier_UsersPHP.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Entites_fichier_UsersPHP.png" alt="Capture d'écran du fichier Users"></a>
            <p>Penchons nous sur l'entité "created_at", nous allons rajouter cette ligne :</p>
            <p><span class="text-info bg-dark px-2 pb-1">(type: 'datetime_immutable', options: ['default' =>
                    'CURRENT_TIMESTAMP'])]</span></p>
            <a target="_blank" href="assets/img/Capture_datetime_fichier_UsersPHP.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_datetime_fichier_UsersPHP.png"
                    alt="Capture d'écran changement de la propriété datetime immutable fichier Users"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityCategoriesCreate" class="fw-bolder">3.5 - Création de l'entité Catégories</h3>
            <a target="_blank" href="assets/img/Capture_Entite_Categories1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Entite_Categories1.png"
                    alt="Capture d'écran création des entités de la table Categories"></a>
            <a target="_blank" href="assets/img/Capture_Entite_Categories2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Entite_Categories2.png"
                    alt="Capture d'écran création des entités de la table Categories"></a>
            <a target="_blank" href="assets/img/Capture_Entite_Categories3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Entite_Categories3.png"
                    alt="Capture d'écran création des entités de la table Categories"></a>
            <p>ManyToOne veut dire explicitement que chaque catégorie est en relation avec un parent et que chaque
                parent peut avoir plusieurs categories</p>
            <a target="_blank" href="assets/img/Capture_Fichier_Categories.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Fichier_Categories.png" alt="Capture d'écran du fichier Categories.php"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityCouponsCreate" class="fw-bolder">3.6 - Création des autres tables</h3>
            <p>Nous allons créer les autres tables de la base de données.</p>
            <ul>
                <li class="fw-bolder">Table Coupons</li>
            </ul>
            <a target="_blank" href="assets/img/Capture_Coupons1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Coupons1.png" alt="Capture d'écran création de la table Coupons"></a>
            <a target="_blank" href="assets/img/Capture_Coupons2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Coupons2.png" alt="Capture d'écran création de la table Coupons"></a>
            <a target="_blank" href="assets/img/Capture_Coupons3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Coupons3.png" alt="Capture d'écran création de la table Coupons"></a>
            <a target="_blank" href="assets/img/Capture_Coupons4.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Coupons4.png" alt="Capture d'écran création de la table Coupons"></a>
            <a target="_blank" href="assets/img/Capture_Coupons5.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Coupons5.png" alt="Capture d'écran création de la table Coupons"></a>
            <p>Nous allons changer 2 informations dans le fichier Coupons.php qui se situe dans le repertoire src/Entity
                :</p>
            <ul>
                <li>code</li>
                <li>created_at</li>
            </ul>
            <p>Rajoutez à la ligne de l'entité "code"<span class="text-info bg-dark px-2 pb-1">, unique: true</span></p>
            <p>Et à la ligne de l'entité "created_at" comme pour la table "Users"<span
                    class="text-info bg-dark px-2 pb-1">(type: 'datetime_immutable', options: ['default' =>
                    'CURRENT_TIMESTAMP'])]</span></p>
            <a target="_blank" href="assets/img/Capture_Fichier_Coupons.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Fichier_Coupons.png"
                    alt="Capture d'écran changement de la propriété code fichier Coupons"></a>
            <a target="_blank" href="assets/img/Capture_Fichier_Coupons2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Fichier_Coupons2.png"
                    alt="Capture d'écran changement de la propriété datetime immutable fichier Users"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityProductsCreate" class="fw-bolder">3.7 - Table Products</h3>
            <a target="_blank" href="assets/img/Capture_Products1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Products1.png" alt="Capture d'écran création de la table Products"></a>
            <a target="_blank" href="assets/img/Capture_Products2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Products2.png" alt="Capture d'écran création de la table Products"></a>
            <a target="_blank" href="assets/img/Capture_Products3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Products3.png" alt="Capture d'écran création de la table Products"></a>
            <a target="_blank" href="assets/img/Capture_Products4.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Products4.png" alt="Capture d'écran création de la table Products"></a>
            <p>Ajoutez à la ligne de l'entité "created_at" comme pour la table "Users"<span
                    class="text-info bg-dark px-2 pb-1">(type: 'datetime_immutable', options: ['default' =>
                    'CURRENT_TIMESTAMP'])]</span></p>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityImagesCreate" class="fw-bolder">3.8 - Table Images</h3>
            <a target="_blank" href="assets/img/Capture_Images1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Images1.png" alt="Capture d'écran création de la table Images"></a>
            <a target="_blank" href="assets/img/Capture_Images2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Images2.png" alt="Capture d'écran création de la table Images"></a>
            <a target="_blank" href="assets/img/Capture_Images3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Images3.png" alt="Capture d'écran création de la table Images"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityOrdersCreate" class="fw-bolder">3.9 - Table Orders</h3>
            <a target="_blank" href="assets/img/Capture_Orders1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Orders1.png" alt="Capture d'écran création de la table Orders"></a>
            <a target="_blank" href="assets/img/Capture_Orders2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Orders2.png" alt="Capture d'écran création de la table Orders"></a>
            <a target="_blank" href="assets/img/Capture_Orders3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Orders3.png" alt="Capture d'écran création de la table Orders"></a>
            <a target="_blank" href="assets/img/Capture_Orders4.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Orders4.png" alt="Capture d'écran création de la table Orders"></a>
            <p>Rajoutez à la ligne de l'entité "reference"<span class="text-info bg-dark px-2 pb-1">, unique:
                    true</span></p>
            <p>Et à la ligne de l'entité "created_at" comme pour la table "Users"<span
                    class="text-info bg-dark px-2 pb-1">(type: 'datetime_immutable', options: ['default' =>
                    'CURRENT_TIMESTAMP'])]</span></p>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="entityOrdersDetailsCreate" class="fw-bolder">3.10 - Table OrdersDetails</h3>
            <a target="_blank" href="assets/img/Capture_OrdersDetails1.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_OrdersDetails1.png"
                    alt="Capture d'écran création de la table OrdersDetails"></a>
            <a target="_blank" href="assets/img/Capture_OrdersDetails2.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_OrdersDetails2.png"
                    alt="Capture d'écran création de la table OrdersDetails"></a>
            <a target="_blank" href="assets/img/Capture_OrdersDetails3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_OrdersDetails3.png"
                    alt="Capture d'écran création de la table OrdersDetails"></a>
            <a target="_blank" href="assets/img/Capture_OrdersDetails4.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_OrdersDetails4.png"
                    alt="Capture d'écran création de la table OrdersDetails"></a>
            <a target="_blank" href="assets/img/Capture_OrdersDetails5.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_OrdersDetails5.png"
                    alt="Capture d'écran création de la table OrdersDetails"></a>
            <p>Supprimez les lignes dans le fichier "OrdersDetails.php" qui se trouve dans le répertoire src/Entity :
            </p>
            <div class="row">
                <div class="col-6"><a target="_blank" href="assets/img/Capture_Fichier_OrdersDetails1.png"><img
                            class="w-100 pe-3 py-2 my-2" src="assets/img/Capture_Fichier_OrdersDetails1.png"
                            alt="Capture d'écran suppression des ligne dans le fichier OrdersDetails"></a>
                </div>
                <div class="col-6"><a target="_blank" href="assets/img/Capture_Fichier_OrdersDetails2.png"><img
                            class="w-100 pe-3 pt-4 my-2" src="assets/img/Capture_Fichier_OrdersDetails2.png"
                            alt="Capture d'écran suppression des ligne dans le fichier OrdersDetails"></a>
                </div>
            </div>
            <p>Ajoutez une ligne pour les 2 relations que l'on a créé avec "products" et "orders" :</p>
            <span class="text-info bg-dark px-2 pb-1">#[ORM\Id]</span>
            <p>Voici dans le fichier ce que cela donne :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_OrdersDetails3.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Fichier_OrdersDetails3.png"
                    alt="Capture d'écran ajout des ligne dans le fichier OrdersDetails"></a>
            <p>Maintenant que toutes les données ont été enregistrées de la base de données, nous allons faire une
                migration SQL.</p>
            <p>Pour cela il faut taper dans votre terminal la commande suivante :
                <span class="text-info bg-dark px-2 pb-1">symfony.exe console make:migration</span>
            </p>
            <a target="_blank" href="assets/img/Capture_Migration.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_Migration.png"
                    alt="Capture d'écran commande de migrations de la base de données"></a>
            <p>Cela va créer un fichier dans le répertoire "migrations" qui va contenir toutes les requêtes SQL pour
                créer la migration dans mySQL</p>
            <p>Ensuite vous devez taper dans le terminal cette commande :
                <span class="text-info bg-dark px-2 pb-1">symfony.exe console doctrine:migrations:migrate</span>
            </p>
            <a target="_blank" href="assets/img/Capture_MigrationMake.png"><img class="w-100 pe-3 py-3 my-2"
                    src="assets/img/Capture_MigrationMake.png"
                    alt="Capture d'écran commande de migrations de la base de données dans mySQL"></a>
            <p>Si vous vous rendez dans mySQL, vous verrez que la base de données a bien été transférée dans mySQL.</p>
            <h3 class="">Enfin, vous allez pouvoir travailler votre site avec le côté visuel cette fois-ci !</h3>
        </div>
    </div>
</div>