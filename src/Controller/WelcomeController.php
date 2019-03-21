<?php
// src/Controller/WelcomeController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome", methods={"GET"})
     */
    public function index($number = 1)
    {
        $number = random_int(0, 100);
        return $this->render('lucky/number.html.twig',['number' => $number]);
    }

}  