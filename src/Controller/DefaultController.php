<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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

    /**
     * @Route("/redirect", name="redirect")
     */
    public function redirection() {
        // return $this->redirectToRoute("index");

        // Génération d'une URL perso
        // $url = $this->generateUrl('index');
        // return new Response("Url générée: ".$url);
        
        // Générer URL absolue
        $url = $this->generateUrl('index',[] ,UrlGeneratorInterface::ABSOLUTE_URL);
        // Return new Response("Url ABS généré: ".$url);

        // Générer URL 2 encore le retour
        $url = $this->generateUrl("test", [
            'id' => 123,
            'ext' => 'jpg'
        ]);
        // return new Response("Url généré: " .$url);
        
        // Générer url depuis un template
        return $this->render('Default/redirection.html.twig');
    }

    
}

