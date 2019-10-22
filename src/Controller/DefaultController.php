<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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

    /**
     * @Route("/req{id}.{ext}.{age}.{sexe}", name="req")
     */
    public function req(Request $request) {
        /**
         *   Récupérer le GET
         * ex avec: /req?prenom=Antoine
         */
        // return new Response($request);
            $id = $request->attributes->get('id');
            $ext = $request->attributes->get('ext');
            $age = $request->attributes->get('age');
            $sexe = $request->attributes->get('sexe');

        // return new Response("id: ".$id."<br>ext: ".$ext."<br>age: " .$age. "<br>sexe: " .$sexe);
    }

    /**
     * @Route("/session-add:{name}:{content}", name="session-add")
     */
    public function sessionAdd($name, $content, Request $request) {
        // Création d'une session
        $name = $request->attributes->get('name');
        $content = $request->attributes->get('content');

        $session = $request->getSession();
        $session->set($name, $content);

        return new Response('Session ajoutée !');
    }

    /**
     * @Route("/session-del", name="session-del")
     */
    public function sessionDel() {
        session_destroy();
        return new Response('Session des truites');
    }

    /**
     * @Route("/sessions", name="sessions")
     */

     public function sessions(Request $request) {
        $session = $request->getSession();
        $display = '';
        foreach($session as $key => $value) {
            $display = $display.'<p> La session ('.$key.') contient: ('.$value.') </p>';
        }

        // return new Response($display);
        return $this->render('default/sessions.html.twig', [
            'display' => $display
        ]);
    }

    /**
    * @Route("/condition-{age}", name="condition")
    */
    public function condition($age) {
        return $this->render('default/condition.html.twig', ['age' => $age]);
    }

    /**
     * @Route("/boucle", name="boucle")
     */

    public function boucle() {
        $heroes = ['SpiderMan', 'Captain America', 'Iron Man', 'Thor', 'Hulk'];

        return $this->render('default/boucle.html.twig', ['heroes' => $heroes]);
    }

    /**
     * @Route("/variables", name="variables")
     */

    public function variables() {
        return $this->render('default/variables.html.twig');
     }

     /**
      * @Route("/fils", name="fils")
      */

    public function fils() {
        return $this->render('default/fils.html.twig');
    }
}

