<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * Matches /blog exactly
     *
     * @Route("/blog/{page<\d+>?1}", 
     * name="blog_list", 
     * requirements={"page"="\d+"} 
     * )
     */
    
    public function list($page = 1) // Prend  la variable $page et a pour valeur par défaut 1
    {
        // ...
        $page;
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show($slug = null) // Prend valeur de l'URL et par défaut est vide
    {
        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // /blog/my-blog-post
        $url = $this->generateUrl(
            'blog_show',
            ['slug' => 'my-blog-post']
        );
        echo($url);
    }
}

