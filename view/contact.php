<?php
include 'templates/header.php';
?>

<div id="contactPage" class="container">
    <section class="justify-content-center align-items-center pt-4">
        <form class="contact-form mx-auto border border-1 border-dark rounded-3" method="POST">
            <h5 class="title">Contactez-nous</h5>
            <p class="description">N'hésitez pas à nous contacter si vous avez besoin d'aide, ou d'une autre question.
            </p>
            <div>
                <input type="text" class="form-control rounded border-white mb-3 form-input" id="name" name="name" placeholder="Nom" required>
            </div>
            <div>
                <input type="email" class="form-control rounded border-white mb-3 form-input" name="email" placeholder="E-mail" required>
            </div>
            <div>
                <textarea id="message" class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" name="message" placeholder="Message" required></textarea>
            </div>
            <div class="submit-button-wrapper">
                <button type="submit" class="btn btn-lg btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Envoyer</button>
            </div>
        </form>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <div class="offcanvas offcanvas-top w-50 top-50 start-50 translate-middle text-bg-dark bg-opacity-75" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header mx-auto">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel">Votre email a été envoyé avec succès.</h5>
                </div>
                <div class="offcanvas-body text-center mt-4">
                    <p>Merci de nous avoir contacté !<?php echo $_POST['name']; ?></p>
                    <p>Nous avons bien reçu votre message : <?php echo $_POST['message']; ?></p>
                    <p>Nous mettrons tout en œuvre pour vous répondre le plus rapidement possible.</p>
                </div>
            </div>
            <?php } ?>
        
    </section>
</div>


<?php
include 'templates/footer.php';
?>