<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page2" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">2 - Création d'un projet
            Web
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/kpSYFMV4eJc?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="2 - Présentation et configuration du projet (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="projetWeb" class="fw-bolder mt-4">2.1 - Création d'un nom de projet</h3>
            <p>Vous allez devoir créer un projet avec Symfony sur Visual studio Code.</p>
            <p>Pour cela il y a 4 manières possibles de faire.<br> Tapez ces commandes dans le terminal de
                VSCode :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">symfony new nom_du_projet</span></li>
                <li><span class="text-info bg-dark px-2 pb-1">composer create-project symfony/skeleton
                        nom_du_projet</span>
                </li>
            </ul>
            <p>Ces commandes créent un dossier avec le nom "nom_du_projet", et récupèrent plusieurs
                outils
                dont l'outil
                <span class="fw-bolder">composer.json</span>.<br>
                Cet outil va installer les composants de bases nécessaires et minimalistes pour la
                création
                d'un site
                web.
            </p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">symfony new --full nom_du_projet</span></li>
                <li><span class="text-info bg-dark px-2 pb-1">composer create-project
                        symfony/website-skeleton
                        nom_du_projet</span></li>
            </ul>
            <p>Les deux dernières commandes créent les mêmes composants que les premières, mais rajoutent
                d'autres dossiers
                en plus pour votre projet web.<br>
                Neanmoins il est préférable d'utiliser les commandes "composer" pour la création de son
                projet.
            </p>
            <p>Pour verifier la version "Symfony" installée, il suffit de taper la commande <span class="text-info bg-dark px-2 pb-1">symfony console about</span>.</p>
            <a target="_blank" href="assets/img/Capture_Version_Symfony.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Version_Symfony.png" alt="Capture d'écran version de Symfony et PHP"></a>
            <p>Nous voyons la version de Symfony : V.6.1.12 et la version de PHP : V.8.2.6</p>
            <p>Vous pouvez aussi installer Symfony avec différentes versions pour cela, il faudra taper ces
                commandes :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">symfony new --webapp nom_du_projet
                        --version=lts</span> pour
                    la version lts.</li>
                <li><span class="text-info bg-dark px-2 pb-1">composer create-project symfony/skeleton
                        nom_du_projet
                        5.4.*</span> pour la version 5.4.*.</li>
            </ul>

        </div>
        <hr class="my-4">
        <div>
            <h3 id="verifProject" class="fw-bolder mt-4">2.2 - Vérification du projet créé</h3>
            <p>Faites une vérification du projet créé avec la commande <span class="text-info bg-dark px-2 pb-1">symfony
                    check:requirements</span></p>
            <p>Vous obtiendrez ces informations :</p>
            <a target="_blank" href="assets/img/Capture_check_requirements.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_check_requirements.png" alt="Capture d'écran de la commande symfony check:requirements"></a>
            <p>Les W représentent des erreurs à rectifier si possible. Par exemple :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1"> * intl extension should be available<br>
                        > Install and enable the intl extension (used for validators).</span></li>
            </ul>
            <p>Pour cela ouvrir votre fichier "php.ini", qui se trouve dans le répertoire de PHP, avec un
                éditeur de texte,
                ensuite recherchez en tapant directement <kbd>Ctrl</kbd>+<kbd>F</kbd> le terme "intl",
                puis décommentez l'extension en supprimant le ";" ou rajoutez l'extension si vous ne le
                trouvez
                pas.</p>
            <a target="_blank" href="assets/img/Capture_chgt_extension.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_chgt_extension.png" alt="Capture d'écran pour décommenter l'extension intl"></a>
            <p>Lorsque tout est OK et qu'il n'y a plus de messages d'erreurs, alors pour symfony tout est
                opérationnel et
                vous aurez cette fenêtre :</p>
            <a target="_blank" href="assets/img/Capture_tout_ok.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_tout_ok.png" alt="Capture d'écran pour le check:requirements OK"></a>


        </div>
        <hr class="my-4">
        <div>
            <h3 id="architectureProjet" class="fw-bolder mt-4">2.3 - Architecture du projet</h3>
            <p>Voici l'architecture que vous devez avoir après toutes les installations, configurations et
                vérifications.
            </p>
            <ul>
                <li><span class="fw-bolder">bin</span> : ce dossier contient les exécutables de Symfony,
                    comme
                    le fichier
                    console.</li>
                <li><span class="fw-bolder">config</span> : bon, là le nom du dossier parle de lui-même. Il
                    contient tous
                    les fichiers de configuration de Symfony ainsi que les dépendances que vous installerez
                    plus
                    tard.</li>
                <li><span class="fw-bolder">public</span> : c'est le point d'entrée de votre site Web, mais
                    c'est aussi ici
                    que vous stockerez tous vos "<em>assets</em>" (images, css, javascript...).</li>
                <li><span class="fw-bolder">migrations</span> : là se retrouvent des fichiers permettant de
                    créer ou de
                    mettre à jour la base de données.</li>
                <li><span class="fw-bolder">src</span> : c'est ici que toute votre logique métier sera
                    traité !
                    Il contient
                    notamment les controllers, les entités, les formulaires...</li>
                <li><span class="fw-bolder">templates</span> : vous pourrez exprimer votre talent de
                    designer
                    dans ce
                    dossier. Toutes les vues sont concentrées ici.</li>
                <li><span class="fw-bolder">tests</span> : tous vos tests unitaires et fonctionnels seront
                    regroupés dans ce
                    dossier.</li>
                <li><span class="fw-bolder">var</span> : Symfony se chargera d'y stocker le cache et les
                    logs de
                    l'application.</li>
                <li><span class="fw-bolder">vendor</span> : ce dossier contient toutes les dépendances
                    installées avec
                    Composer.</li>
                <li><span class="fw-bolder">.env</span> : ce fichier regroupe les différentes variables
                    d'environnements de
                    l'application.</li>
            </ul>
            <a target="_blank" href="assets/img/Capture_Architecture_Projet.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Architecture_Projet.png" alt="Capture d'écran montrant l'architecture du projet"></a>

        </div>
        <hr class="my-4">
        <div>
            <h3 id="dossierEnv" class="fw-bolder mt-4">2.4 - Configuration du dossier d'environnement</h3>
            <p>Nous allons configurer maintenant l'environnement de notre projet</p>
            <p>Copiez le dossier <span class="fw-bolder">.env</span> et renommez le <span class="fw-bolder">.env.locale</span>.</p>
            <p>Comme nous sommes en développement, la ligne <span class="text-info bg-dark px-2 pb-1">APP_ENV=dev</span>
                reste en dev,
                mais dès lors que l'on sera en production on changera cette ligne en <span class="text-info bg-dark px-2 pb-1">APP_ENV=prod</span>.</p>
            <a target="_blank" href="assets/img/Capture_app_env.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_app_env.png" alt="Capture d'écran pour le APP_ENV=dev"></a>
            <p>La ligne <span class="text-info bg-dark px-2 pb-1">APP_SECRET= * </span>, servira au jeton CSRF pour la validation des formulaires, à modifier
                lors du passage
                en production.</p>
            <p>Pour la configuration de la base de données :</p>
            <ul>
                <li>Commentez la ligne <span class="text-info bg-dark px-2 pb-1">DATABASE_URL="postgresql://..."</span> avec un <kbd>#</kbd> devant</li>
                <li>Décommentez la ligne <span class="text-info bg-dark px-2 pb-1">DATABASE_URL="mysql://..."</span> en retirant le <kbd>#</kbd> de devant</li>
                <li>Changez les paramètres de connexion avec votre nom d'utilisateur et votre mot de passe
                    de
                    connexion à
                    mySQL</li>
                <li>Changez le nom de votre base de données par celui que vous aurez choisi</li>
                <li>Changez le numéro de la version de mySQL</li>
            </ul>
            <p>Voici un exemple de ce que vous pouvez avoir après les modifications apportées :</p>
            <a target="_blank" href="assets/img/Capture_database_mysql.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_database_mysql.png" alt="Capture d'écran pour le changement de configuration de la base de données"></a>
        </div>
        <hr class="my-4">
        <div>
            <h3 id="demarrageServeur" class="fw-bolder mt-4">2.5 - Démarrage du serveur</h3>
            <p>Vous avez la possibilité de démarrer un serveur avec Symfony afin de tester votre projet :
            </p>
            <p><span class="text-info bg-dark px-2 pb-1">
                    symfony serve
                    symfony server:log</span></p>
            <p>Il est tout à fait possible de faire la même chose avec une autre commande, mais Symfony ne
                la
                recommande
                plus. D'ailleurs, ils ont retiré la dépendance nécessaire à son fonctionnement. Faites
                l'essai
                en lançant
                cette commande :</p>
            <p><span class="text-info bg-dark px-2 pb-1">php bin/console server:start</span></p>
            <p>En cas d'erreur, installez via composer le serveur :</p>
            <p><span class="text-info bg-dark px-2 pb-1">composer req server</span></p>
            <p>Il ne vous reste qu'à ouvrir votre navigateur et à entrer l'adresse qu'affiche votre
                terminal,
                qui est
                normalement : <a target="_blank" href="http://127.0.0.1:8000">http://127.0.0.1:8000</a></p>
            <p>Attention, le serveur Web tourne directement via le terminal, donc si vous fermez le
                terminal,
                vous coupez le
                serveur !</p>
            <h3 class="">Et voilà, votre projet est prêt à être travaillé ! ?</h3>
        </div>
    </div>
</div>