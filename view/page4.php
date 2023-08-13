<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page4" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">4 - Mise en place des templates et des assets
        </div>
        <div>
        <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/aqw1bgitDcE?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="4 - Mise en place des templates et des assets CSS et JS (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="defaultPage" class="fw-bolder mt-4">4.1 - Démarrage du serveur Symfony</h3>
            <p>Nous allons démarrer le serveur pour voir dans notre navigateur comment se présente le serveur
                Symfony 6.</p>
            <p>Dans votre terminal taper cette ligne de commande :</p>
            <p><span class="text-info bg-dark px-2 pb-1">symfony serve</span>
                vous tomberez sur un lien qu'il va falloir rentrer dans votre navigateur :
                <a target="_blank" href="http://127.0.0.1:8000">http://127.0.0.1:8000</a>
                <a target="_blank" href="assets/img/Capture_Screen_DafaultPage.png">
                    <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Screen_DafaultPage.png" alt="Capture d'écran de la page de défaut du serveur Symfony 6"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="createMainController" class="fw-bolder mt-4">4.2 - Création de notre premier contrôleur</h3>
            <p>Vous pouvez ajouter un controller directement avec les fichiers, mais une commande permet de faire
                plus proprement cette manipulation</p>
            <p><span class="text-info bg-dark px-2 pb-1">symfony console make:controller MainController</span>
                , cela va créer un contrôleur nommé "MainController".</p>
            <a target="_blank" href="assets/img/Capture_Creation_Controller.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Creation_Controller.png" alt="Capture d'écran de la création d'un controller"></a>
            <p>Cette commande va créer un fichier MainController.php dans le dossier src/controller et un dossier
                dans le répertoire "templates" qui s'appelera "main"
                , ainsi qu'un fichier "index.html.twig" dans ce dossier.
            </p>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="vueDetails" class="fw-bolder mt-4">4.3 - Les vues</h3>
            <p>Les vues ou templates permettent de séparer le code HTML du code PHP. Ce sont elles qui s'afficheront
                aux yeux de tous ! C'est la partie visible de l'iceberg.</p>
            <p>Pour la partie "vue" de votre projet, Symfony intègre un moteur de template nommé Twig. Ce moteur
                propose son propre langage. La syntaxe est facile à appréhender et ne perturbe pas le code HTML.</p>
            <p>Il intègre des sécurisations sur nos variables de manière automatique et se charge de mettre vos
                pages en cache à leur première exécution. Ceci permet d'améliorer le chargement de vos pages. ?</p>
            <p>Twig regroupe un ensemble de fonctions et de filtres pour faciliter le développement de vos pages
                sans avoir besoin de réinventer la roue.</p>
            <ul>
                <li class="fw-bolder">Structure d'un fichier Twig</li>
            </ul>
            Sous Symfony, tous nos fichiers de vue se situent dans le dossier "templates", à la racine du projet.
            Voici la structure d'un fichier Twig :
            <div class="w-50 mx-auto">
                <a target="_blank" href="assets/img/Capture_exemple_fichier_tiwg.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_exemple_fichier_tiwg.png" alt="Capture d'écran d'un fichier twig.html"></a>
            </div>
            <p>Détaillons un peu ce fichier. En première ligne, nous avons un "extends" suivi du nom d'un fichier
                "base.html.twig". Tout comme en PHP POO, "extends" représente un héritage d'un autre fichier. Je
                reviendrai dessus un peu plus tard dans l'article.</p>
            <p>Il est suivi d'un <span class="text-info bg-dark px-2 pb-1">{% block title %}</span>. Ce bloc permet
                de donner un titre à notre page, c'est l'équivalent en HTML à :</p>
            <div class="w-50 mx-auto">
                <a target="_blank" href="assets/img/Capture_code_monTtire.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_code_monTtire.png" alt="Capture d'écran d'un code en html"></a>
            </div>
            <p>Enfin, nous avons un <span class="text-info bg-dark px-2 pb-1">{% block title %}</span> qui est la
                partie la plus importante de ce fichier, car c'est ici que la magie opère !<br>
                C'est à l'intérieur de ce bloc que vous mettrez vos codes HTML tel que vous le feriez normalement.
                La différence est que vous ne précisez pas la balise html, les métas et body.<br>
                Il s'agit juste du code HTML se trouvant dans la balise "body" d'un fichier HTML habituel.
            </p>
            <p>Rajouter la ligne "meta" dans le fichier "base.twig.html" dans le répertoire "templates" pour le côté
                responsive du site.</p>
            <a target="_blank" href="assets/img/Capture_meta_line_code.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_meta_line_code.png" alt="Capture d'écran ajout de la ligne meta de code dans le fichier base.twig.html"></a>
            <p>Voici le fichier après modification de celui-ci :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_Base_Twig_Html.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Fichier_Base_Twig_Html.png" alt="Capture d'écran ajout d'une ligne de code dans le fichier base.twig.html"></a>
        </div>
        <hr class="mb-3">
        <div>
            <h3 id="ajoutBootstrap" class="fw-bolder mt-4">4.4 - Ajout du template Bootstrap</h3>
            <p>Vous devez créer un dossier dans le répertoire "public" et le nommer "assets"</p>
            <p>Dans ce dossier "assets" créer de nouveaux deux dossiers, un dossier "css" pour le style et un autre dossier
                "js" pour le javascript</p>
            <p>Dans le dossier "css", vous pourrez ajouter les fichiers "bootstrap.min.css" et
                "bootstrap.min.css.map"</p>
            <p>Dans le dossier "js", vous pourrer ajouter les fichiers "bootstrap.bundle.min.js" et
                "bootstrap.bundle.min.js.map" télechargés dans le site Bootstrap</p>
            <p><a target="_blank" href="https://getbootstrap.com/docs/5.3/getting-started/download/">https://getbootstrap.com/docs/5.3/getting-started/download/</a>
            <p>Ou directement en cliquant sur ce lien : </p>
            <p><a target="_blank" href="https://github.com/twbs/bootstrap/releases/download/v5.3.0/bootstrap-5.3.0-dist.zip">https://github.com/twbs/bootstrap/releases/download/v5.3.0/bootstrap-5.3.0-dist.zip</a></p>
            <p>N'oubliez pas de créer aussi un fichier "styles.css", dans le dossier "css", pour vos propres styles
                et dans le dossier "js", un fichier "scripts.js" pour vos propres scripts.</p>
            <p>Ensuite vous pourrez injecter vos fichiers dans le fichier "base.html.twig" comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_Injection_Css_JS.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Fichier_Injection_Css_JS.png" alt="Capture d'écran d'injection des fichiers css et js"></a>
            <p>Créer un dossier "_partials" dans le répertoire "templates" pour le "header" et le "footer" de vos
                pages.</p>
            <p>Dans ce dossier, vous créerez deux fichiers un se nommant "_nav.html.twig" et l'autre
                "_footer.html.twig".</p>
            <a target="_blank" href="assets/img/Capture_Fichier_Nav.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Fichier_Nav.png" alt="Capture d'écran fichier '_nav.html.twig'"></a>
            <p>Dans le fichier "_footer.html.twig", vous pouvez rajouter ce que vous voulez, içi nous avons stylisé un container avec trois colonnes :</p>
            <div class="w-50 mx-auto">
                <a target="_blank" href="assets/img/Capture_Fichier_Footer.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Fichier_Footer.png" alt="Capture d'écran fichier '_footer.html.twig'"></a>
            </div>
            <p>Et enfin le fichier "base.html.twig" avec tous ces changements :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_Base_Twig_Html2.png">
                <img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Fichier_Base_Twig_Html2.png" alt="Capture d'écran du fichier base.html.twig après changement"></a>
            <h3>Voilà, les parties template et asset sont terminées, nous allons rentrer dans le vif du sujet !!!
            </h3>
        </div>
    </div>
</div>