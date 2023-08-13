<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitreActive">
    <div id="page1" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">1 - Installation & Configuration</div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/kuKb3VfcTWE" title="1 - Installation de Symfony 6" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="preRequis" class="fw-bolder mt-4">1.1 - Pré-requis</h3>
            <p>Pour pouvoir commencer ce tutoriel, il vous faut quelques pré-requis :</p>
            <ul>
                <li>
                    <p class="fw-bold">Installation de Visual Studio Code</p>
                </li>
            </ul>
            <p>Visual Studio Code est un éditeur de code source qui peut être utilisé avec une variété de
                langages de programmation, notamment Java, JavaScript, Go, Node.js et C++. Il est basé sur le
                cadre Electron, qui est utilisé pour développer des applications Web Node.js qui s'exécutent sur
                le moteur de présentation Blink.</p>
            <p>Vous le trouverez en cliquant sur ce lien : <a href="https://code.visualstudio.com/" target="_blank">https://code.visualstudio.com/</a></p>
            <a target="_blank" href="assets/img/Capture_VisualStudioCode.png"><img class="w-100 pe-3 py-3" src="assets/img/Capture_VisualStudioCode.png" alt="Capture d'écran du site Visual Studio Code"></a>
            <ul>
                <li class="fw-bold">Extentions et paramètrage de VSCode</li>
            </ul>
            <p>Dans Visual Studio Code, rendez-vous dans la page des extensions, ou en tapant directement
                <kbd>Ctrl</kbd>+<kbd>Maj</kbd>+<kbd>X</kbd>.
            </p>
            <p>Dans la barre de recherche entrez les extentions suivantes et installez-les et activez-les un
                par un :</p>
            <ul>
                <li>PHP DocBlocker</li>
                <li>Twig Language 2</li>
                <li>PHP Namespace Resolver</li>
                <li>Git Graph</li>
            </ul>
            <p><span class="fw-bolder">Twig</span> est un moteur de templates pour le langage de programmation
                PHP, utilisé par défaut par le framework Symfony.
                Il a été inspiré par Jinja, moteur de template Python.</p>
            <a target="_blank" href="assets/img/Capture_Twig_Language_2.png"><img class="w-100 pe-3 py-3" src="assets/img/Capture_Twig_Language_2.png" alt="Capture d'écran de l'extension Twig Language 2"></a>
            <p class="pt-2">Il faut préciser à VSCode de considérer l’extension <span class="fw-bolder">.twig</span> comme l’extension <span class="fw-bolder">.html</span> : </p>
            <ul class="pb-2">
                <li>Allez dans Fichier > Préférences > Paramètres, ou tapez <kbd>Ctrl</kbd>+<kbd>+</kbd></li>
                <li>Tapez dans la barre de recherche "emmet" puis dans l'onglet "emmet include langage", ajouter
                    la clé twig = html</li>
            </ul>
            <a target="_blank" href="assets/img/change_language_parameter_twig.png"><img class="w-100 pe-3 py-3" src="assets/img/change_language_parameter_twig.png" alt="Capture d'écran de changement de langage Twig Language 2"></a>
            <ul>
                <li class="py-4 fw-bold">
                    Installation de PHP</li>
            </ul>
            <p><span class="fw-bolder">PHP</span> est un langage de script utilisé le plus souvent côté
                serveur. Dans cette architecture, le serveur interprète le code PHP des pages web demandées
                et génère du code (HTML, XHTML, CSS par exemple) et des données (JPEG, GIF, PNG par exemple)
                pouvant être interprétés et rendus par un navigateur web. PHP peut également générer
                d'autres formats comme le WML, le SVG et le PDF. </p>
            <p>Vous le trouverez en cliquant sur ce lien : <a href="https://www.php.net/" target="_blank">https://www.php.net/</a></p>
            <a target="_blank" href="assets/img/Capture_PHP.png"><img class="w-100 pe-3 py-3" src="assets/img/Capture_PHP.png" alt="Capture d'écran du site PHP"></a>
            <ul>
                <li class="fw-bold">Installation de Composer</li>
            </ul>
            <p>C'est un gestionnaire de dépendances insdipensable à l'utilisation du framework Symfony.</p>
            <p>Vous le trouverez en cliquant sur ce lien : <a href="https://getcomposer.org/" target="_blank">https://getcomposer.org/</a></p>
            <p>Téléchargez et exécutez <span class="fw-bolder">Composer-Setup.exe</span>. Il installera la
                dernière version de Composer et configurera votre PATH de Windows afin que vous puissiez
                appeler <span class="fw-bolder">Composer</span> depuis n'importe quel répertoire de votre
                ligne de commande.</p>
            <a target="_blank" href="assets/img/Capture_Composer.png"><img class="w-100 pe-3 py-3" src="assets/img/Capture_Composer.png" alt="Capture d'écran du site Composer"></a>
        </div>
        <hr class="mt-4">
        <div>
            <h3 id="installationSymfony" class="fw-bolder mt-4">1.2 - Installation de Symfony 6</h3>
            <ul>
                <li>
                    <p class="fw-bold">Installation de Symfony CLI</p>
                </li>
            </ul>
            <p>Tout d'abord verifiez les versions installées de PHP et de Composer</p>
            <p>Entrez la ligne suivante dans un terminal comme cmd.exe de Windows ou dans le terminal de Visual
                Studio Code :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">php -v</span></li>
            </ul>
            <a target="_blank" href="assets/img/Capture_Version_PHP.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Version_PHP.png" alt="Capture d'écran version de PHP"></a>
            <p>Pour installer Symfony 6, il faut la version 8.0.2 de PHP ou superieur.<br>
                Si la commande php n’est pas reconnue, il faut vérifier le PATH dans les variables
                d’environnement et modifier ou ajouter le chemin vers le dossier de l’exécutable souhaité.</p>
            <p>Voici un lien qui vous explique comment modifier les variables d'environnement sur Windows : <a href="https://learn.microsoft.com/fr-fr/iis/application-frameworks/install-and-configure-php-on-iis/install-and-configure-php" target="_blank">https://learn.microsoft.com/fr-fr/iis/application-frameworks/install-and-configure-php-on-iis/install-and-configure-php</a>
            </p>
            <p>Entrez la ligne suivante dans un terminal comme cmd.exe de Windows ou dans le terminal de Visual
                Studio Code :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">composer -v</span></li>
            </ul>
            <a target="_blank" href="assets/img/Capture_Version_Composer.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Version_Composer.png" alt="Capture d'écran version de Composer"></a>
            <p>Si le retour de ligne vous renvoie un numero de version comme l'image ci-dessus, alors
                l'installation de Composer s'est bien passée.</p>
            <p>Ensuite vous devez installer <span class="fw-bolder">Scoop</span>, voici le lien du site : <a href="https://scoop.sh/" target="_blank">https://scoop.sh/</a></p>
            <p>Entrez les deux lignes successivement dans un terminal comme cmd.exe de Windows ou dans le
                terminal de Visual Studio Code :</p>
            <ul>
                <li><pre><code class="text-info bg-dark px-2 py-1">Set-ExecutionPolicy RemoteSigned -Scope CurrentUser # Optional: Needed to run a remote script the first time</code></pre></li>
                <li><pre><code class="text-info bg-dark px-2 py-1">irm get.scoop.sh | iex</code></pre></li>
            </ul>
            <a target="_blank" href="assets/img/Capture_Scoop.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Scoop.png" alt="Capture d'écran du site Scoop"></a>
            <p>La CLI Symfony est un outil de développement pour vous aider à créer, exécuter et gérer vos
                applications Symfony directement depuis votre terminal. C'est une Open-Source, qui
                fonctionne sur macOS, Windows et Linux, et vous ne devez l'installer qu'une seule fois sur
                votre système.</p>
            <p>Entrez la ligne suivante dans un terminal comme cmd.exe de Windows ou dans le terminal de
                Visual Studio Code :</p>
            <ul class="mb-2">
                <li><span class="text-info bg-dark px-2 pb-1">scoop install symfony-cli</span></li>
            </ul>
            <p>Vous le trouverez en cliquant sur ce lien : <a href="https://symfony.com/" target="_blank">https://symfony.com/</a> dans l'onglet Download.</p>
            <a target="_blank" href="assets/img/Capture_Symfony_CLI.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Symfony_CLI.png" alt="Capture d'écran du site Symfony"></a>
            <p>Verifiez la version installée de Symfony CLI</p>
            <p>Entrez la ligne suivante dans un terminal comme cmd.exe de Windows ou dans le terminal de Visual
                Studio Code :</p>
            <ul>
                <li><span class="text-info bg-dark px-2 pb-1">symfony -v</span></li>
            </ul>
            <a target="_blank" href="assets/img/Capture_Version_Symfony_CLI.png"><img class="w-100 pe-3 py-3 my-2" src="assets/img/Capture_Version_Symfony_CLI.png" alt="Capture d'écran version de Symfony CLI"></a>
            <h3>Voilà tout est prêt, vous pouvez commencer votre projet, en l'occurence créer un site Web.</h3>
        </div>
    </div>
</div>