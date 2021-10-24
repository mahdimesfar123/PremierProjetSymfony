<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\HttpException;

class controller extends AbstractController
{
    public function index(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            'hello mahdi mesfar!'
        );
    }
    /**
      * @Route("/number/{max<\d+>}")
     */
    public function number(int $max): Response
      {
        $number = random_int(0, $max);

        return $this->render('number.html.twig', [
            'number' => $number,
        ]);
      }
      /**
      * @Route("/number/{max?}")
     */
    public function number2($max): Response
    {
      if (!is_numeric($max)){
        throw new HttpException(404, 'On ne peut pas vous afficher cette page');
      }
      
      $number = random_int(0, $max);
      return $this->render('number.html.twig', [
          'number' => $number,
      ]);
      }
    }