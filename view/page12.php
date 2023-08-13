<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page12" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">12 - Mettre à jour de Symfony 6
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/nkSvIRQXuGE?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="12 - Mettre à jour Symfony 6.0 en version 6.1 (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="symfonyUpdate" class="fw-bolder mt-4">12.1 - Mise à jour de Symfony</h3>
            <p>Nous allons voir comment faire une mise à jour mineure de la version de Symfony</p>
            <p>Dans le site de Symfony, vous trouverez la documentation tout en bas de la page pour mettre à jour votre version :
            <a target="_blank" href="https://symfony.com/doc/current/setup.html">https://symfony.com/doc/current/setup.html</a>
            <p>Plusieurs mises à jour sont possibles :</p>
                <ul>
                    <li>Mise à jour du <strong>Patch</strong> de Symfony ( par exemple v.6.0.0 => v.6.0.1 )</li>
                    <li>Mise à jour du <strong>Mineure</strong> de Symfony ( par exemple v.6.1.0 => v.6.2.0 )</li>
                    <li>Mise à jour du <strong>Majeure</strong> de Symfony ( par exemple v.5.2 => v.6.1 )</li>
                </ul>
            <p>Alors dans notre projet, nous irons dans le fichier "composer.json"<br>
            Nous devons rechercher toutes les lignes qui commencent par <code class="text-info bg-dark px-3 py-1">"symfony/..." : "6.1.*";</code></p>
            <p>Selectionnez le numero de la version içi <code class="text-info bg-dark px-3 py-1">"6.1"</code></p>
            <a target="_blank" href="assets/img/Capture_Fichier_composerJson.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Fichier_composerJson.png" alt="Capture d'écran de la modification du fichier composer.json"></a>
            <p>Puis avec la commande pour lancer le remplacement d'une selection <kbd>Ctrl</kbd>+<kbd>H</kbd> de VSCode puis remplacez par "6.2" si nécessaire.</p>
            <p>Ensuite rendez vous dans le terminal et tapez <code class="text-info bg-dark px-3 py-1">composer update "symfony/*" --with-all-dependencies</code></p>
            <p>Vous verrez tout cela sur le site de Symfony en cliquant sur le lien ci-dessus, pour plus de renseignements.</p>
            <h3>Voilà vous êtes à jour au niveau de l'application Symfony.</h3>
        </div>
    </div>
</div>