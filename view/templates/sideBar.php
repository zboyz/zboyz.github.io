<div class="container-fluid mt-3">
    <div class="row mx-2">
        <aside class="col-11 col-md-3 mx-md-auto p-4 text-center rounded-2 my-4">
            <nav class="navbar navbar-expand-md bg-transparent justify-content-end navTableMatieres w-100">
                <button class="navbar-toggler bg-white border border-5 border-secondary" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasMd" aria-controls="navbarOffcanvasMd"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fs-3"></span>
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarOffcanvasMd"
                    aria-labelledby="navbarOffcanvasmdLabel">
                    <div class="offcanvas-header">
                        <div class="offcanvas-title" id="navbarOffcanvasmdLabel"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <form class="justify-content-center mb-3 px-3">
                        <input id="searchInput" type="text" name="searchInput"
                            class="align-self-center form-control border-dark mb-2 mb-sd-2 mb-md-2 mb-lg-0"
                            placeholder="Rechercher">
                    </form>
                    <div class="row">
                        <div class="col-12 p-3">
                            Lien Github de mon projet e-commerce symfony 6 :<br><a
                                href="https://github.com/zboyz/ecommerce_sf6"
                                target="_blank">https://github.com/zboyz/ecommerce_sf6</a>
                        </div>
                        <hr>
                        <div class="col-12 p-3">
                            Lien Github du projet de Benoit e-commerce symfony 6 :<br><a
                                href="https://github.com/NouvelleTechno/e-commerce-Symfony-6"
                                target="_blank">https://github.com/NouvelleTechno/e-commerce-Symfony-6</a>
                        </div>
                    </div>
                    <hr>
                    <div class="offcanvas-title fw-bold text-center fs-3 mx-3 mb-4 border-bottom border-secondary"
                        id="offcanvasExampleLabel">Table des matières</div>
                    <div class="offcanvas-body text-start">
                        <ul class="flex-column navbar-nav w-100 justify-content-between">
                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#installation-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 1 - Installation & Configuration </span>
                                </i>
                                <div class="collapse" id="installation-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=1#preRequis" class="text-decoration-none link-dark">
                                                1.1 - Pré-Requis</a>
                                        </li>
                                        <li><a href="?page=1#installationSymfony"
                                                class="text-decoration-none link-dark">
                                                1.2 - Installation de
                                                Symfony 6</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#createProject-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 2 - Création d'un projet Web </span>
                                </i>
                                <div class="collapse" id="createProject-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=2#projetWeb" class="text-decoration-none link-dark">
                                                2.1 - Projet d'un
                                                site web</a></li>
                                        <li><a href="?page=2#verifProject" class="text-decoration-none link-dark">
                                                2.2 - Vérification du projet</a></li>
                                        <li><a href="?page=2#architectureProjet" class="text-decoration-none link-dark">
                                                2.3 - Architecture du projet</a></li>
                                        <li><a href="?page=2#dossierEnv" class="text-decoration-none link-dark">
                                                2.4 - Configuration
                                                de l'environnement</a></li>
                                        <li><a href="?page=2#demarrageServeur" class="text-decoration-none link-dark">
                                                2.5 - Démarrage du serveur</a></li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#createBDD-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 3 - Création de la base de données </span>
                                </i>
                                <div class="collapse" id="createBDD-collapse">
                                    <ul class="list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=3#MCD" class="text-decoration-none link-dark">
                                                3.1 - Modélisation de la
                                                base de
                                                données</a></li>
                                        <li><a href="?page=3#bddCreate" class="text-decoration-none link-dark">
                                                3.2 - Création de la base de données</a></li>
                                        <li><a href="?page=3#entityCreate" class="text-decoration-none link-dark">
                                                3.3 - Création
                                                des entités</a></li>
                                        <li><a href="?page=3#entityUsersCreate" class="text-decoration-none link-dark">
                                                3.4 - Création des entités de la
                                                table Users</a></li>
                                        <li><a href="?page=3#entityCategoriesCreate"
                                                class="text-decoration-none link-dark">
                                                3.5 - Création des entités de la
                                                table Categories</a></li>
                                        <li><a href="?page=3#entityCouponsCreate"
                                                class="text-decoration-none link-dark">
                                                3.6 - Création des entités de la
                                                table Coupons</a></li>
                                        <li><a href="?page=3#entityProductsCreate"
                                                class="text-decoration-none link-dark">
                                                3.7 - Création des entités de la
                                                table Products</a></li>
                                        <li><a href="?page=3#entityImagesCreate" class="text-decoration-none link-dark">
                                                3.8 - Création des entités de la
                                                table Images</a></li>
                                        <li><a href="?page=3#entityOrdersCreate" class="text-decoration-none link-dark">
                                                3.9 - Création des entités de la
                                                table Orders</a></li>
                                        <li><a href="?page=3#entityOrdersDetailsCreate"
                                                class="text-decoration-none link-dark">
                                                3.10 - Création des entités de la
                                                table OrdersDetails</a></li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#createTemplates-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 4 - Mise en place des templates et des assets
                                    </span>
                                </i>
                                <div class="collapse" id="createTemplates-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=4#defaultPage" class="text-decoration-none link-dark">
                                                4.1 - Démarrage
                                                du serveur
                                                Symfony</a></li>
                                        <li><a href="?page=4#createMainController"
                                                class="text-decoration-none link-dark">
                                                4.2 - Création de notre premier contrôleur</a></li>
                                        <li><a href="?page=4#vueDetails" class="text-decoration-none link-dark">
                                                4.3 - Les vues</a></li>
                                        <li><a href="?page=4#ajoutBootstrap" class="text-decoration-none link-dark">
                                                4.4 - Ajout
                                                du template Bootstrap</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#createInscription-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 5 - Inscription et authentification des
                                        utilisateurs
                                    </span>
                                </i>
                                <div class="collapse" id="createInscription-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=5#authCreate" class="text-decoration-none link-dark">
                                                5.1 - Création de l'authentification</a>
                                        </li>
                                        <li><a href="?page=5#createFormInscription"
                                                class="text-decoration-none link-dark">
                                                5.2 - Création d'un formulaire d'inscription</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#optimisation-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 6 - Optimisation des entités et DataFixtures
                                    </span>
                                </i>
                                <div class="collapse" id="optimisation-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=6#entityOptimisation" class="text-decoration-none link-dark">
                                                6.1 - Optimisation des entités</a>
                                        </li>
                                        <li><a href="?page=6#dataFixtures" class="text-decoration-none link-dark">
                                                6.2 - Mise en place des dataFixtures</a>
                                        </li>
                                        <li><a href="?page=6#UsersdataFixtures" class="text-decoration-none link-dark">
                                                6.3 - Mise en place des DataFixtures pour l'entité "Users"</a>
                                        </li>
                                        <li><a href="?page=6#ProductsdataFixtures"
                                                class="text-decoration-none link-dark">
                                                6.4 - Mise en place des DataFixtures pour les entités "Products" et
                                                "Images"</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#createController-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 7 - Création des contrôleurs
                                    </span>
                                </i>
                                <div class="collapse" id="createController-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=7#controllerCreate" class="text-decoration-none link-dark">
                                                7.1 - Création des contrôleurs</a>
                                        </li>
                                        <li><a href="?page=7#productsControllerCreateManually"
                                                class="text-decoration-none link-dark">
                                                7.2 - Création d'un contrôleur "Products" manuellement</a>
                                        </li>
                                        <li><a href="?page=7#usersControllerCreateManually"
                                                class="text-decoration-none link-dark">
                                                7.3 - Création d'un contrôleur "Users" manuellement</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#viewIntegrate-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 8 -Intégrer les données dans les vues
                                    </span>
                                </i>
                                <div class="collapse" id="viewIntegrate-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=8#mainIntegration" class="text-decoration-none link-dark">
                                                8.1 - Intégration des données dans la page d'accueil</a>
                                        </li>
                                        <li><a href="?page=8#categroyIntegration"
                                                class="text-decoration-none link-dark">
                                                8.2 - Intégration des données dans la page des catégories</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#emailVerif-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 9 - Vérification d'adresse email sans bundle
                                    </span>
                                </i>
                                <div class="collapse" id="emailVerif-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=9#updateBDD" class="text-decoration-none link-dark">
                                                9.1 - Mise à jour de la base de données</a>
                                        </li>
                                        <li><a href="?page=9#mailHog" class="text-decoration-none link-dark">
                                                9.2 - Installation et utilisation de l'application MailHog</a>
                                        </li>
                                        <li><a href="?page=9#mailConfigurate" class="text-decoration-none link-dark">
                                                9.3 - Configuration des paramètres du mail</a>
                                        </li>
                                        <li><a href="?page=9#tokensCreate" class="text-decoration-none link-dark">
                                                9.4 - Création d'un JSON Web Tokens</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#passwordRecup-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 10 - Récupération de mot de passe sans bundle
                                    </span>
                                </i>
                                <div class="collapse" id="passwordRecup-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=10#usersPrepare" class="text-decoration-none link-dark">
                                                10.1 - Préparation de l'entité Users</a>
                                        </li>
                                        <li><a href="?page=10#passwordOmit" class="text-decoration-none link-dark">
                                                10.2 - Création de la route "Mot de passe oublié"</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#errorPage-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 11 - Personnaliser les pages d'erreur
                                    </span>
                                </i>
                                <div class="collapse" id="errorPage-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=11#404PagePerso" class="text-decoration-none link-dark">
                                                11.1 - Personnalisation de la page erreur 404</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#updateSymfony-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 12 - Mettre à jour Symfony 6
                                    </span>
                                </i>
                                <div class="collapse" id="updateSymfony-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=12#symfonyUpdate" class="text-decoration-none link-dark">
                                                12.1 - Mise à jour de Symfony</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#productsDetails-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 13 - Accès des données et création de la page
                                        détails des produits
                                    </span>
                                </i>
                                <div class="collapse" id="productsDetails-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=13#detailsProductsPageCreate"
                                                class="text-decoration-none link-dark">
                                                13.1 - Création de la page détails des produits</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#paginationConfig-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 14 - Mise en place de la pagination sans
                                        bundle
                                    </span>
                                </i>
                                <div class="collapse" id="paginationConfig-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=14#paginationCreateWithoutBundle"
                                                class="text-decoration-none link-dark">
                                                14.1 - Création d'une pagination sans bundle</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#usersPermission-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 15 - Mise en place des permissions
                                        utilisateurs
                                    </span>
                                </i>
                                <div class="collapse" id="usersPermission-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=15#usersPermCreate" class="text-decoration-none link-dark">
                                                15.1 - Création des permissions utilisateurs</a>
                                        </li>
                                        <li><a href="?page=15#votersCreate" class="text-decoration-none link-dark">
                                                15.2 - Création des voters</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#formAddProducts-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 16 - Creation du formulaire d'ajout de
                                        produits
                                    </span>
                                </i>
                                <div class="collapse" id="formAddProducts-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=16#formCreateAddModifProducts"
                                                class="text-decoration-none link-dark">
                                                16.1 - Création des formulaires d'ajout et de modification de
                                                produits</a>
                                        </li>
                                        <li><a href="?page=16#addModifControllerCreate"
                                                class="text-decoration-none link-dark">
                                                16.2 - Création des contrôleurs d'ajout et de modification des
                                                produits</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#uploadImages-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 17 - Upload et gestion d'images multiples
                                    </span>
                                </i>
                                <div class="collapse" id="uploadImages-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=17#uploadImages" class="text-decoration-none link-dark">
                                                17.1 - Upload des images dans notre projet</a>
                                        </li>
                                        <li><a href="?page=17#gestionImages" class="text-decoration-none link-dark">
                                                17.2 - Gestion des images côté Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#formOptimisation-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 18 - Optimisation et validation des
                                        formulaires
                                    </span>
                                </i>
                                <div class="collapse" id="formOptimisation-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=18#formValidate" class="text-decoration-none link-dark">
                                                18.1 - Validation des formulaires</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#interfaceAdminCreate-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 19 - Création d'une interface d'administration
                                        sans bundle
                                    </span>
                                </i>
                                <div class="collapse" id="interfaceAdminCreate-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=19#adminController" class="text-decoration-none link-dark">
                                                19.1 - Création du contrôleur Admin</a>
                                        </li>
                                        <li><a href="?page=19#UsersController" class="text-decoration-none link-dark">
                                                19.2 - Création du contrôleur Utilisateurs</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="mb-1">
                                <i class="chevron bi bi-chevron-right collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#shoppingGestion-collapse" aria-expanded="false" role="img">
                                    <span class="fst-normal fw-semibold"> 20 - Gestion du panier d'achats sans bundle
                                    </span>
                                </i>
                                <div class="collapse" id="shoppingGestion-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-4">
                                        <li><a href="?page=20#controllerCartCreate"
                                                class="text-decoration-none link-dark">
                                                20.1 - Création d'un contrôleur pour les paniers d'achats</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </aside>
        <main class="col-12 col-md-9 mx-md-auto mt-4">