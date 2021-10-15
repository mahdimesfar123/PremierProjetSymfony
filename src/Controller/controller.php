<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class controller extends AbstractController
{
    public function index(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            'hello world!'
        );
    }
    /**
      * @Route("/number")
     */
    public function number(): Response
      {
        $number = random_int(0, 100);

        return $this->render('number.html.twig', [
            'number' => $number,
        ]);
      }
}