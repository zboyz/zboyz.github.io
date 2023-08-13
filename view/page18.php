<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2">
    <div id="page18" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">18 - Optimisation et validation des formulaires
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/DCB3QLlFCJM?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="18 - Optimisation et validation des formulaires (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="formValidate" class="fw-bolder mt-4">18.1 - Validation des formulaires</h3>
            <p>Nous allons optimiser les formulaires précédemments créer pour notre projet.</p>
            <p>Ainsi éviter que des utilisateurs puissent ajouter n'importe quels produits dans notre base de données.</p>
            <p>Dans notre fichier "Products.php" situé dans le répertoire "src/Entity", nous pouvons ajouter des contraintes de validité des champs "Nom" et "Stocks".</p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_Products3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_Products3.png" alt="Capture d'écran de la modification du fichier Products.php dans le répertoire src/Entity"></a>
            <p>Puis dans notre fichier "ProductsFormType.php" situé dans le répertoire "src/Form", nous allons y rajouter des contriantes des champs "Images" et Prix" </p>
            <a target="_blank" href="assets/img/Capture_modification_Fichier_ProductsFormType2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_modification_Fichier_ProductsFormType2.png" alt="Capture d'écran de la modification du fichier ProductsFormType.php dans le répertoire src/Form"></a>
            <p>Pour plus d'informations sur la validation sur Symfon, il y a la documentation dans leur site :</p>
            <p><a href="https://symfony.com/doc/current/components/form.html#validation" target="_blank">https://symfony.com/doc/current/components/form.html#validation</a></p>
            <h3>Voilà un petit tour d'horizon sur les validations des formulaires !</h3>
        </div>
    </div>
</div>