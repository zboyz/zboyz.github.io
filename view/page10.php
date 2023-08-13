<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page10" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">10 - Récupération de mot de passe sans bundle
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/ZPqcKl2Izt0?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="10 - Récupération de mot de passe sans bundle (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="usersPrepare" class="fw-bolder mt-4">10.1 - Préparation de l'entité Users</h3>
            <p>Nous allons mettre en place le système de récupération de mot de passe sans utiliser de Bundle.
                Nous allons ajouter un bouton “Mot de passe oublié” sur la page de connexion, qui permettra de demander la réinitialisation du mot de passe de l'utilisateur.</p>
            <p>Tout d'abord nous allons rajouter une propriété à notre entité "Users", dans le fichier "Users.php" situé dans le dossier "src/Entity", vous pouvez rajoutez cette ligne :</p>
            <ul>
                <li><code class="text-info bg-dark px-2 pb-1">#[ORM\Column(type: 'string', length: 100)]</code></li>
                <li><code class="text-info bg-dark px-2 pb-1">private $resetToken;</code></li>
            </ul>
            <p>Comme le montre l'image ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_Users4.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_Users4.png" alt="Capture d'écran de la modification du fichier Users.php"></a>
            <p>Puis dans le même fichier vous rajouterez les getter et setter de la propriété comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_Users5.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_Users5.png" alt="Capture d'écran de la modification du fichier Users.php"></a>
            <p>Ensuite faite une migration dans votre base de données en tapant ces deux lignes :</p>
            <ul>
                <li><code class="text-info bg-dark px-2 pb-1">symfony console make:migration</code></li>
                <li><code class="text-info bg-dark px-2 pb-1">symfony console doctrine:migrations:migrate</code></li>
            </ul>
            <p>Nous obtenons un ajout d'une colonne "reset_token" dans la table Users de PhpMyAdmin comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_PhpMyAdmin_Users2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_PhpMyAdmin_Users2.png" alt="Capture d'écran dans la table Users de PhpMyAdmin"></a>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="passwordOmit" class="fw-bolder mt-4">10.2 - Création de la route "Mot de passe oublié"</h3>
            <p>Nous allons modifier le fichier "login.html.twig" dans le répertoire "templates/Security" comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_loginHtmlTwig3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_loginHtmlTwig3.png" alt="Capture de la modification du fichier login.html.twig"></a>
            <p>Nous allons créer un formulaire grâce au bundle de Symfony.</p>
            <p>Tapez cette ligne de commande dans votre terminal :</p>
            <p><code class="text-info bg-dark px-2 pb-1">symfony console make:form</code></p>
            <p>Voici les instructions à faire ensuite :</p>
            <a target="_blank" href="assets/img/Capture_Creation_form.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_form.png" alt="Capture de la création d'un formulaire avec Symfony"></a>
            <p>Cela a permis de créer un nouveau fichier nommé "ResetPasswordRequestFormType.php" dans le dossier "src/Form</p>
            <p>Nous allons rajouter les lignes de code comme ci-dessous :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class ResetPasswordRequestFormType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('email', EmailType::class, [
                    'label' => 'Entrez votre e-mail',
                    'attr' => [
                        'placeholder' => 'exemple@email.fr',
                        'class' => 'form-control'
                    ]
                ])
            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                // Configure your form options here
            ]);
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voici ce que nous obtenons dans notre fichier :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_ResetPasswordRequestFormType1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_ResetPasswordRequestFormType1.png" alt="Capture de la création d'un formulaire avec Symfony"></a>
            <p>Dans le dossier "templates/emails", nous allons créer un fichier nommé "password_rest.html.twig", puis nous allons rajouter le code comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_password_resetHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_password_resetHtmlTwig.png" alt="Capture de la création du ficiher pawword_rest.html.twig"></a>
            <p>Maintenant nous allons créer un fichier "ResetPasswordFormType.php" dans le dossier "src/Form"</p>
            <p>Nous allons rajouter les lignes de code comme ci-dessous :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class ResetPasswordFormType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('password', PasswordType::class, [
                    'label' => 'Entrez votre mot de passe',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ])
            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                // Configure your form options here
            ]);
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voici ce que nous obtenons dans notre fichier :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_ResetPasswordFormType.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_ResetPasswordFormType.png" alt="Capture de la création d'un formulaire avec Symfony"></a>
            <p>Nous allons créer un fichier nommé "reset_password.html.twig" dans le dossier "templates/security", puis nous allons ajouter ces lignes de codes comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_reset_passwordHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_reset_passwordHtmlTwig.png" alt="Capture de la création d'un formulaire avec Symfony"></a>
            <p>Nous allons modifier le fichier "base.html.twig" dans le répertoire "templates" comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_baseHtmlTwig.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_baseHtmlTwig.png" alt="Capture de la modification du fichier base.html.twig"></a>
            <p>Ensuite nous allons modifier le fichier "SecurityController.php" qui se situe dans le dossier "src/Controller" en rajoutant ce code ci-dessous :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
        #[Route('/oubli-pass', name:'forgotten_password')]
        public function forgottenPassword(
            Request $request,
            UsersRepository $usersRepository,
            TokenGeneratorInterface $tokenGenerator,
            EntityManagerInterface $entityManager,
            SendMailService $mail
        ): Response
        {
            $form = $this->createForm(ResetPasswordRequestFormType::class);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                //On va chercher l'utilisateur par son email
                $user = $usersRepository->findOneByEmail($form->get('email')->getData());

                // On vérifie si on a un utilisateur
                if($user){
                    // On génère un token de réinitialisation
                    $token = $tokenGenerator->generateToken();
                    $user->setResetToken($token);
                    $entityManager->persist($user);
                    $entityManager->flush();
                    
                    // On génère un lien de réinitialisation du mot de passe
                    $url = $this->generateUrl('reset_pass', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
                    
                    // On crée les données du mail
                    $context = compact('url', 'user');

                    // Envoi du mail
                    $mail->send(
                        'no-reply@e-commerce.fr',
                        $user->getEmail(),
                        'Réinitialisation de mot de passe',
                        'password_reset',
                        $context
                    );

                    $this->addFlash('success', 'Email envoyé avec succès');
                    return $this->redirectToRoute('app_login');
                }
                // $user est null
                $this->addFlash('danger', 'Un problème est survenu');
                return $this->redirectToRoute('app_login');
            }

            return $this->render('security/reset_password_request.html.twig', [
                'requestPassForm' => $form->createView()
            ]);
        }

        #[Route('/oubli-pass/{token}', name:'reset_pass')]
        public function resetPass(
            string $token,
            Request $request,
            UsersRepository $usersRepository,
            EntityManagerInterface $entityManager,
            UserPasswordHasherInterface $passwordHasher
        ): Response
        {
            // On vérifie si on a ce token dans la base
            $user = $usersRepository->findOneByResetToken($token);
            
            if($user){
                $form = $this->createForm(ResetPasswordFormType::class);

                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid()){
                    // On efface le token
                    $user->setResetToken('');
                    $user->setPassword(
                        $passwordHasher->hashPassword(
                            $user,
                            $form->get('password')->getData()
                        )
                    );
                    $entityManager->persist($user);
                    $entityManager->flush();

                    $this->addFlash('success', 'Mot de passe changé avec succès');
                    return $this->redirectToRoute('app_login');
                }

                return $this->render('security/reset_password.html.twig', [
                    'passForm' => $form->createView()
                ]);
            }
            $this->addFlash('danger', 'Jeton invalide');
            return $this->redirectToRoute('app_login');
        }
    }
                    </code>
                </pre>
            </div>
            <p>Cela nous donne dans notre fichier ceci :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_SecurityController.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_SecurityController.png" alt="Capture de la modification du fichier SecurityController.php"></a>
            <h3>Voila nous en avons fini avec la récupération du mot de passe, si celui-ci a été oublié !</h3>
        </div>
    </div>
</div>