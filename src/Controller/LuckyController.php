<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Utiliseation des templates
use Symfony\Component\HttpFoundation\RedirectResponse; //Redirection de pages
use Psr\Log\LoggerInterface; //logging


class LuckyController extends AbstractController // Associe classe au template
{
    /**
    * @Route("/lucky/number/{max}", name="app_lucky_number")
    */
    public function number($max, LoggerInterface $logger)
    {
        $logger->info('We are logging!');

        // $number = random_int(0, 100);

    // Affiche un chiffre au hasard entre 0 et 100
        // return new Response(
        //     '<html><body>Lucky number: '.$number.'</body></html>'
        // );
    
    //Fait la même chose mais passe par le template number.html.twig
        // return $this->render('lucky/number.html.twig', [ // Appel du HTML
        //     'number' => $number,
        // ]);

    //
        $number = random_int(0, $max);
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
        
        // OU BIEN renders templates/lucky/number.html.twig
        // return $this->render('lucky/number.html.twig', ['number' => $number]);
    }


// Redirectionde pages
    public function index()
    {
        // redirects to the "homepage" route
        return $this->redirectToRoute('homepage');

        // redirectToRoute is a shortcut for:
        // return new RedirectResponse($this->generateUrl('homepage'));

        // does a permanent - 301 redirect
        return $this->redirectToRoute('homepage', [], 301);

        // redirect to a route with parameters
        return $this->redirectToRoute('app_lucky_number', ['max' => 10]);

        // redirects to a route and maintains the original query string parameters
        return $this->redirectToRoute('blog_show', $request->query->all());

        // redirects externally
        return $this->redirect('http://symfony.com/doc');
    }

}

?>