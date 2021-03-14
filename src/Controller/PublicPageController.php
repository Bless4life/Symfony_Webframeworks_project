<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicPageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $template = 'public_page/index.html.twig';
        $args = [

        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/about", name="about")
     */
    public function About(): Response
    {
        $template = 'public_page/about.html.twig';
        $args = [

        ];
        return $this->render($template, $args);
    }


    /**
     * @Route("/siteMap", name="siteMap")
     */
    public function SiteMap(): Response
    {
        $template = 'public_page/siteMap.html.twig';
        $args = [

        ];
        return $this->render($template, $args);
    }
}
