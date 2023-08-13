<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page11" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">11 - Personnaliser les pages d'erreur
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/BXMjfCk8DSY?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="11 - Personnaliser les pages d&#39;erreurs (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="404PagePerso" class="fw-bolder mt-4">11.1 - Personnalisation de la page erreur 404</h3>
            <p>Nous allons personnaliser les pages d'erreur (404 par exemple) sur notre projet.
            <p>Nous allons commencer par installer un composant de Symfony qui s'appelle TwigPack.</p>
            <p>Dans votre terminal veuillez taper cette ligne de commande :</p>
            <p><code class="text-info bg-dark px-3 py-1">composer require symfony/twig-pack</code></p>
            <p>Dans le dossier "templates" nous allons créer un nouveau dossier "bundles" ensuite nous créerons dans ce dossier un nouveau dossier "TwigBundle" 
                puis nous créerons un dossier "Exception" à l'intérieur de ce dossier.</p>
            <p>Dans ce dossier nous y mettrons toutes les pages erreur tel que 404 ou 403 ...</p>
            <p>Nous allons créer un fichier nommé "error404.html.twig" et un autre fichier nommé "error403.html.twig"</p>
            <p>Pour vérifier notre page d'erreur 404 par exemple nous devons taper en url : <a href="127.0.0.1:8000/_error/404" target="_blank">127.0.0.1:8000/_error/404</a></p>
            <p>Voici un exemple sommaire de la page :</p>
            <a target="_blank" href="assets/img/Capture_Fichier_error404HtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Fichier_error404HtmlTwig.png" alt="Capture d'écran du fichier error404.html.twig"></a>
            <h3>Maintenant vous pouvez styliser votre page comme bon vous semble !</h3>
        </div>
    </div>
</div>