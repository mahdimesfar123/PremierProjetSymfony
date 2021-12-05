<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends AbstractController
{


    public function index(): Response

    {

        $session =new Session();
        $session = $this->get('session');
        $session->start();
        $moviesArray=array();
        $session->set('moviesArray', $moviesArray);
        return new Response(
            '<html><body>Hello World </body></html>'
        );
    }
}
