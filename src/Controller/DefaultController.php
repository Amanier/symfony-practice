<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController {

    /**
     * @Route("/", name="index")
     */

    public function index() {
        /**
         * Réponse simple
         * use ... \Response;
         */
        // return new Response('<body> Mon premier Symfony !</body>');

        /**
         * Retourne un template
         */

        return $this->render('default/home.html.twig');
    }
}

?>