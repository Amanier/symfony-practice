<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController {
    public function index() {
        /**
         * Réponse simple
         * use ... \Response;
         */
        return new Response('Mon premier Symfony !');
    }
}

?>