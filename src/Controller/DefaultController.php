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

    /**
    * @Route("/page-test-{id}.{ext}", 
    *   name="test", 
    *   requirements={"id"="\d+"}, 
    *   defaults={"id": 1, "ext": "png"})
    */

     // mettre : {} dans une route : paramètre de route (comme au dessus) Route = créer l'URL

    public function test($id, $ext) {
        /**
        * Réponse simple
        * use ... \Response;
        */
        // return new Response('<body> Ma deuxième page Symfony !</body>');

        /**
         * Reponse avec paramètre
         */

        //  return new Response("id=" .$id. " et " .$ext);

        return $this->render("default/test.html.twig",
            [
                'id' => $id,
                'ext' => $ext
            ]);
    }
}

?>