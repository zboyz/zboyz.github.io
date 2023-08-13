<div class="text-bg-light p-4 mb-4 mx-auto border border-secondary rounded-2 chapitre">
    <div id="page9" class="page">
        <div class="fs-3 fw-bold text-center rounded-2 bg-secondary bg-opacity-25 py-2">9 - Vérification d'adresse email sans bundle
        </div>
        <div>
            <div class="my-4 row">
                <iframe class="col-10 mx-auto" width="914" height="514" src="https://www.youtube.com/embed/UrJUn2EL07U?list=PLBq3aRiVuwyzI0MT4LhvwqkVenz5pF_DM" title="9 - Vérification d&#39;adresse email sans bundle (Symfony 6)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <h3 id="updateBDD" class="fw-bolder mt-4">9.1 - Mise à jour de la base de données</h3>
            <p>Nous allons ajouter la vérification d'adresse e-mail sans ajouter de bundle à notre projet.
                Dans ce processus, nous allons envoyer un email à l'utilisateur pour vérifier que son adresse existe.</p>
            <p>Pour pouvoir stocker le statut “Vérifié” de notre utilisateur, nous devons modifier notre fichier "Users.php" qui se trouve dans le dossier "src/Entity" afin d'y intégrer l'information.
                Nous commençons par ajouter une propriété <code class="text-info bg-dark px-2 pb-1">is_verified</code> dans notre entité comme ceci</p>
            <pre><code class="text-info bg-dark px-2 pb-1">#[ORM\Column(type: 'boolean')] private $is_verified = false;</code></pre>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_Users2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_Users2.png" alt="Capture d'écran de la modification du fichier Users.php"></a>
            <p>Puis aussi rajouter les getter et setter de cette propriété :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code class="">
    public function getIsVerified(): ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified): self
    {
        $this->is_verified = $is_verified;

        return $this;
    }
                    </code>
                </pre>
            </div>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_Users3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_Users3.png" alt="Capture d'écran de la modification du fichier Users.php"></a>
            <p>Ensuite faite une migration dans votre base de données en tapant ces deux lignes :</p>
            <ul>
                <li><code class="text-info bg-dark px-2 pb-1">symfony console make:migration</code></li>
                <li><code class="text-info bg-dark px-2 pb-1">symfony console doctrine:migrations:migrate</code></li>
            </ul>
            <p>Nous obtenons un ajout d'une colonne "is_verified" dans la table Users de PhpMyAdmin comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_PhpMyAdmin_Users1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_PhpMyAdmin_Users1.png" alt="Capture d'écran dans la table Users de PhpMyAdmin"></a>
            <p>Nous allons modifier aussi le fichier "base.html.twig" qui se trouve dans le répertoire "templates" pour renvoyer un message lorsque l'utilisateur n'est pas reconnu :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_baseHtmlTwig1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_baseHtmlTwig1.png" alt="Capture d'écran modification du fichier base.html.twig"></a>
            <p>Nous allons créer ensuite un nouveau fichier "_flash.html.twig" dans le dossier "templates/_partials" et y insérer le code ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier__flashHtmlTwig1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier__flashHtmlTwig1.png" alt="Capture d'écran création du fichier _flash.html.twig"></a>
            <p>Puis rajoutez cette ligne</p>
            <pre><code class="text-info bg-dark px-2 pb-1">{% include "_partials/_flash.html.twig" %}</code></pre> en dessous de la ligne
            <pre><code class="text-info bg-dark px-2 pb-1">{% block body %}{% endblock %}</code></pre>
            <p>dans le fichier "base.html.twig" dans le dossier "templates".</p>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="mailHog" class="fw-bolder mt-4">9.2 - Installation et utilisation de l'application MailHog</h3>
            <p>Tout d’abord, rendez-vous sur la page des versions de <a href="https://github.com/mailhog/MailHog/releases" target="_blank">MailHog</a> sur GitHub pour télécharger la dernière version stable pour Windows</p>
            <p>Comme MailHog pour Windows est un simple programme auto-exécutable, vous pouvez simplement exécuter le fichier .exe téléchargé.<br>
                Si vous recevez des alertes de sécurité, assurez-vous d’autoriser MailHog à s’exécuter sur votre environnement local sans restrictions de pare-feu.</p>
            <p>Voilà à quoi ressemble l'écran de l'application MailHog :</p>
            <a target="_blank" href="assets/img/Capture_Ecran_mailHog.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_mailHog.png" alt="Capture d'écran de l'application MailHog"></a>
            <p>Rien de bien compliqué encore, mais cela confirme que MailHog fonctionne sur votre système.</p>
            <p>Vous pouvez maintenant vous rendre sur <a href="localhost:8025" target="_blank">localhost:8025</a> ou <a href="127.0.0.1:8025" target="_blank">127.0.0.1:8025</a> dans votre navigateur web pour voir l’interface utilisateur de MailHog Web.</p>
            <p>Vous ne pouvez pas encore trouver d’e-mail dans cette liste, car nous n’avons pas configuré notre projet pour utiliser MailHog.</p>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="mailConfigurate" class="fw-bolder mt-4">9.3 - Configuration des paramètres du mail</h3>
            <p>Nous allons maintenant créer un nouveau dossier "Service" dans le répertoire "src" et créer un fichier nommé "SendMailService.php"</p>
            <p>Rajoutez ces lignes dans ce fichier :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Service;

    use Symfony\Bridge\Twig\Mime\TemplatedEmail;
    use Symfony\Component\Mailer\MailerInterface;

    class SendMailService
    {
        private $mailer;

        public function __construct(MailerInterface $mailer)
        {
            $this->mailer = $mailer;
        }

        public function send(
            string $from,
            string $to,
            string $subject,
            string $template,
            array $context
        ): void
        {
            // On crée le mail
            $email = (new TemplatedEmail())
                ->from($from)
                ->to($to)
                ->subject($subject)
                ->htmlTemplate("emails/$template.html.twig")
                ->context($context);

            // On envoie le mail
            $this->mailer->send($email);
        }
    }
                    </code>
                </pre>
            </div>
            <p>Voilà à quoi ressemble le fichier "SendMailService.php" :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_SendMailService.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_SendMailService.png" alt="Capture du fichier SendMailService.php"></a>
            <p>Nous allons créer un nouveau dossier "emails" dans le dossier "templates" et vous allez créer un fichier nommé "register.html.twig"</p>
            <p>Dans ce fichier veuillez écrire ce code :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_registerHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_registerHtmlTwig2.png" alt="Capture du fichier register.htlm.twig"></a>
            <p>Puis nous allons modifier le fichier "RegistrationController.php" dans le dossier "src/Controller" comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_RegistrerController2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_RegistrerController2.png" alt="Capture de la modification du fichier RegistrationController.php"></a>
            <p>Dans le fichier ".env.local", décommenter la ligne</p>
            <pre><code class="text-info bg-dark px-2 pb-1">MAILER_DSN=smtp://localhost:1025</code></pre>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_envLocal.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_envLocal.png" alt="Capture de la modification du fichier .env.local"></a>
            <p>Puis dans le fichier "messenger.yaml" dans le dossier "config/packages",commentez la ligne</p>
            <pre><code class="text-info bg-dark px-2 pb-1"># Symfony\Component\Mailer\Messenger\SendEmailMessage: async</code></pre>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_messagesYaml.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_messagesYaml.png" alt="Capture de la modification du fichier messenger.yaml"></a>
            <p>Maintenant essayez de vous inscrire en remplissant le formulaire d'inscription. Puis allez voir votre fenêtre de MailHog, vous aurez reçu un mail comme ceci :</p>
            <a target="_blank" href="assets/img/Capture_Ecran_MailHogMailReceive.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Ecran_MailHogMailReceive.png" alt="Capture d'écran de la réception d'un mail avec MailHog"></a>
        </div>
        <hr class="mb-4">
        <div>
            <h3 id="tokensCreate" class="fw-bolder mt-4">9.4 - Création d'un JSON Web Tokens</h3>
            <p>Vous pouvez regarder cette documentation si vous ne connaissez pas les "JSON Web Tokens" en suivant ce lien <a href="https://jwt.io/" target="_blank">https://jwt.io/</a></p>
            <p>Afin de valider l'utilisateur, nous allons lui envoyer un jeton (token) permettant d'activer son compte. Ce token sera un JSON Web Token (JWT) qui contiendra les informations qui nous semblent intéressantes. Dans cet exemple, nous allons y insérer l'id de l'utilisateur.
                Pour commencer nous allons créer un service permettant de générer un JWT. Pour plus de détails, la vidéo <a href="https://www.youtube.com/watch?v=dZgHUq-uEGY" target="_blank">https://www.youtube.com/watch?v=dZgHUq-uEGY</a> pourra apporter plus de précisions.</p>
            <p>Dans le dossier "src/Service" nous allons créer un nouveau fichier nommé "JWTService.php" et nous allons insérer ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Service;

    use DateTimeImmutable;

    class JWTService
    {
        // On génère le token

        /**
        * Génération du JWT
        *
        * @param array $header
        * @param array $payload
        * @param string $secret
        * @param integer $validity
        * @return string
        */
        public function generate(array $header, array $payload, string $secret, int $validity = 10800): string
        {
            if ($validity > 0) {
                $now = new DateTimeImmutable();
                $exp = $now->getTimestamp() + $validity;
        
                $payload['iat'] = $now->getTimestamp();
                $payload['exp'] = $exp;
            }

            // On encode en base64
            $base64Header = base64_encode(json_encode($header));
            $base64Payload = base64_encode(json_encode($payload));

            // On "nettoie" les valeurs encodées (retrait des +, / et =)
            $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);
            $base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64Payload);

            // On génère la signature 
            $secret = base64_encode($secret);

            $signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $secret, true);

            $base64Signature = base64_encode($signature);
            $base64Signature = str_replace(['+', '/', '='], ['-', '_', ''], $base64Signature);

            // On crée le token
            $jwt = $base64Header . '.' . $base64Payload . '.' . $base64Signature;

            return $jwt;
        }

        // On vérifie que le token est valide (correctement formé)

        public function isValid(string $token): bool
        {
            return preg_match(
                '/^[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+$/',
                $token
            ) === 1;
        }

        // On récupère le Payload
        public function getPayload(string $token): array
        {
            // On démonte le token
            $array = explode('.', $token);

            // On décode le Payload
            $payload = json_decode(base64_decode($array[1]), true);

            return $payload;
        }

        // On récupère le Header
        public function getHeader(string $token): array
        {
            // On démonte le token
            $array = explode('.', $token);

            // On décode le Header
            $header = json_decode(base64_decode($array[0]), true);

            return $header;
        }

        // On vérifie si le token a expiré
        public function isExpired(string $token): bool
        {
            $payload = $this->getPayload($token);

            $now = new DateTimeImmutable();

            return $payload['exp'] < $now->getTimestamp();
        }

        // On vérifie la signature du Token
        public function check(string $token, string $secret)
        {
            // On récupère le header et le payload
            $header = $this->getHeader($token);
            $payload = $this->getPayload($token);

            // On régénère un token
            $verifToken = $this->generate($header, $payload, $secret, 0);

            return $token === $verifToken;
        }
    }
                    </code>
                </pre>
            </div>
            <p>Ce qui nous donne ce fichier :</p>
            <a target="_blank" href="assets/img/Capture_Creation_Fichier_JWTServices1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Creation_Fichier_JWTServices1.png" alt="Capture de la création du fichier JWTService.php"></a>
            <p>Dans le fichier ".env.local" rajoutez la ligne</p>
            <pre><code class="text-info bg-dark px-2 pb-1">JWT_SECRET='0hLa83lleBroue11e!'</code></pre> à la fin du fichier.
            <p>Puis dans le dossier "config" modifiez le fichier "services.yaml" et rajoutez la ligne</p>
            <pre><code class="text-info bg-dark px-2 pb-1">app.jwtsecret: '%env(JWT_SECRET)%'</code></pre> ainsi vous obtiendrez ceci :
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_servicesYaml2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_servicesYaml2.png" alt="Capture de la modification du fichier services.yaml"></a>
            <p>Dans le fichier "register.html.twig" situé dans le dossier "templates/emails" modifiez la ligne du lien comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_registerHtmlTwig1.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_registerHtmlTwig1.png" alt="Capture de la modification du fichier register.htlm.twig"></a>
            <p>Dans le fichier "base.html.twig" du dossier "templates", changez le lien de renvoi de l'activation comme ci-dessous :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_baseHtmlTwig2.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_baseHtmlTwig2.png" alt="Capture de la modification du fichier base.htlm.twig"></a>
            <p>Et enfin nous allons modifier le fichier "RegistrationController" dans le répertoire "src/Controller" avec ce code :</p>
            <div class="bg-dark w-75 h-auto mx-auto border border-4 border-warning rounded-5 text-info bg-dark px-3 py-1 my-1">
                <pre>
                    <code>
    namespace App\Controller;

    use App\Entity\Users;
    use App\Form\RegistrationFormType;
    use App\Repository\UsersRepository;
    use App\Security\UsersAuthenticator;
    use App\Service\JWTService;
    use App\Service\SendMailService;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

    class RegistrationController extends AbstractController
    {
        #[Route('/inscription', name: 'app_register')]
        public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager, SendMailService $mail, JWTService $jwt): Response
        {
            $user = new Users();
            $form = $this->createForm(RegistrationFormType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // encode the plain password
                $user->setPassword(
                $userPasswordHasher->hashPassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                $entityManager->persist($user);
                $entityManager->flush();
                // do anything else you need here, like send an email

                // On génère le JWT de l'utilisateur
                // On crée le Header
                $header = [
                    'typ' => 'JWT',
                    'alg' => 'HS256'
                ];

                // On crée le Payload
                $payload = [
                    'user_id' => $user->getId()
                ];

                // On génère le token
                $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));

                // On envoie un mail
                $mail->send(
                    'no-reply@monsite.net',
                    $user->getEmail(),
                    'Activation de votre compte sur le site e-commerce',
                    'register',
                    compact('user', 'token')
                );

                return $userAuthenticator->authenticateUser(
                    $user,
                    $authenticator,
                    $request
                );
            }

            return $this->render('registration/register.html.twig', [
                'registrationForm' => $form->createView(),
            ]);
        }

        #[Route('/verif/{token}', name: 'verify_user')]
        public function verifyUser($token, JWTService $jwt, UsersRepository $usersRepository, EntityManagerInterface $em): Response
        {
            //On vérifie si le token est valide, n'a pas expiré et n'a pas été modifié
            if($jwt->isValid($token) && !$jwt->isExpired($token) && $jwt->check($token, $this->getParameter('app.jwtsecret'))){
                // On récupère le payload
                $payload = $jwt->getPayload($token);

                // On récupère le user du token
                $user = $usersRepository->find($payload['user_id']);

                //On vérifie que l'utilisateur existe et n'a pas encore activé son compte
                if($user && !$user->getIsVerified()){
                    $user->setIsVerified(true);
                    $em->flush($user);
                    $this->addFlash('success', 'Utilisateur activé');
                    return $this->redirectToRoute('profile_index');
                }
            }
            // Ici un problème se pose dans le token
            $this->addFlash('danger', 'Le token est invalide ou a expiré');
            return $this->redirectToRoute('app_login');
        }

        #[Route('/renvoiverif', name: 'resend_verif')]
        public function resendVerif(JWTService $jwt, SendMailService $mail, UsersRepository $usersRepository): Response
        {
            $user = $this->getUser();

            if(!$user){
                $this->addFlash('danger', 'Vous devez être connecté pour accéder à cette page');
                return $this->redirectToRoute('app_login');    
            }

            if($user->getIsVerified()){
                $this->addFlash('warning', 'Cet utilisateur est déjà activé');
                return $this->redirectToRoute('profile_index');    
            }

            // On génère le JWT de l'utilisateur
            // On crée le Header
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            // On crée le Payload
            $payload = [
                'user_id' => $user->getId()
            ];

            // On génère le token
            $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));

            // On envoie un mail
            $mail->send(
                'no-reply@monsite.net',
                $user->getEmail(),
                'Activation de votre compte sur le site e-commerce',
                'register',
                compact('user', 'token')
            );
            $this->addFlash('success', 'Email de vérification envoyé');
            return $this->redirectToRoute('profile_index');
        }
    }
                    </code>
                </pre>
            </div>
            <p>Ce qui nous donne ce fichier :</p>
            <a target="_blank" href="assets/img/Capture_Modification_Fichier_RegistrationController3.png">
                <img class="w-100 pe-3 py-3 my-1" src="assets/img/Capture_Modification_Fichier_RegistrationController3.png" alt="Capture de la modification du fichier RegistrationController.php"></a>
            <h3>Vous pouvez essayer de vous inscrire et voir ce que cela vous renvoie !</h3>
        </div>
    </div>
</div>