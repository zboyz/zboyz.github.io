</main>
</div>

<nav aria-label="Page navigation">
    <ul id="items" class="pagination d-flex flex-wrap justify-content-center mx-auto">

        <!-- Afficher le lien "précédent" si on n'est pas sur la première page -->
        <?php if ($numero_page > 1) : ?>
            <li class="page-item">
                <a class="page-link text-dark" href="tutoriel?page=<?php echo $numero_page - 1; ?>" aria-label="Previous"><span aria-hidden="true">&laquo; Précédent</span></a>
            </li>
        <?php endif; ?>

            <!-- Afficher les liens de pagination pour les pages -->
        <?php foreach ($pages as $numero => $fichier) : ?>
            <li class="page-item">
                <a class="page-link text-dark" href="tutoriel?page=<?php echo substr($numero, 4, 2); ?>"><?php echo substr($numero, 4, 2); ?></a>
            </li>
        <?php endforeach; ?>

        <!-- Afficher le lien "suivant" si on n'est pas sur la dernière page -->
        <?php if ($numero_page < count($pages)) : ?>
            <li class="page-item">
                <a class="page-link text-dark" href="tutoriel?page=<?php echo $numero_page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">Suivant &raquo;</span>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav></div>