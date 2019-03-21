<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; // Retourne page d'erreur 404 si réponse non trouvée
use Symfony\Component\HttpFoundation\Request; // Lire les paramètres des requêtes
use Symfony\Component\HttpFoundation\Session\SessionInterface; //Gestion des sessions utilisateur
use Symfony\Component\HttpFoundation\Response; // Récupère et propose les réponses
use Symfony\Component\HttpFoundation\File\File; // Configuration autour des fichiers
use Symfony\Component\HttpFoundation\ResponseHeaderBag; // Configuration autour des fichiers


class BrandNewController extends AbstractController
{
    /**
     * @Route("/brand/new", name="brand_new")
     */
    public function index()
    {
        
        return $this->render('article/list.html.twig');
    }

// Gestion des 404error   
    public function error()
    {
        // retrieve the object from database
        $product = example_of_product;
        if (!$product) {
            throw $this->createNotFoundException('The product does not exist');

            // the above is just a shortcut for:
            // throw new NotFoundHttpException('The product does not exist');
        }

        return $this->render(example_of_product);
    }

// Visualisation des requêtes
    public function request(Request $request, $firstName, $lastName)
    {
        $page = $request->query->get('page', 1);

        // ...
    }

// Stocke les attributs spécifiques aux sessions des utilisateurs
    public function session(SessionInterface $session)
{
    // stores an attribute for reuse during a later user request
    $session->set('foo', 'bar');

    // gets the attribute set by another controller in another request
    $foobar = $session->get('foobar');

    // uses a default value if the attribute doesn't exist
    $filters = $session->get('filters', []);
}

//Affichage de messages flash qui ne s'afficheront qu'une seule fois
public function flash(Request $request)
{
    // ...

    if ($form->isSubmitted() && $form->isValid()) {
        // do some sort of processing

        $this->addFlash(
            'nom_du_message_flash',
            'contenu_du_message_flash'
        );
        // $this->addFlash() is equivalent to $request->getSession()->getFlashBag()->add()

        return $this->redirectToRoute(name_of_route);
    }

    return $this->render(name_of_route);
}

// Récupération de requêtes
    public function request2(Request $request)
    {
        $request->isXmlHttpRequest(); // is it an Ajax request?

        $request->getPreferredLanguage(['en', 'fr']);

        // retrieves GET and POST variables respectively
        $request->query->get('page');
        $request->request->get('page');

        // retrieves SERVER variables
        $request->server->get('HTTP_HOST');

        // retrieves an instance of UploadedFile identified by foo
        $request->files->get('foo');

        // retrieves a COOKIE value
        $request->cookies->get('PHPSESSID');

        // retrieves an HTTP request header, with normalized, lowercase keys
        $request->headers->get('host');
        $request->headers->get('content-type');
    }

//Attribution des réponses    
    public function response(Request $request)
    {
        // creates a simple Response with a 200 status code (the default)
        $response = new Response('Hello '.$name, Response::HTTP_OK);

        // creates a CSS-response with a 200 status code
        $response = new Response('<style> ... </style>');
        $response->headers->set('Content-Type', 'text/css');
    }


//Force le téléchargement d'un fichier
    public function download()
    {
        // send the file contents and force the browser to download it
        return $this->file('/path/to/some_file.pdf');

        // load the file from the filesystem
        $file = new File('/path/to/some_file.pdf');

        return $this->file($file);

        // rename the downloaded file
        return $this->file($file, 'custom_name.pdf');

        // display the file contents in the browser instead of downloading it
        return $this->file('invoice_3241.pdf', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }


}