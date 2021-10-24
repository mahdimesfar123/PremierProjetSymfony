<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LukyController extends AbstractController
{
    public function number(): Response
    {
        $number = random_int(0, 100);
        return new Response("<h1>Lucky number: {$number} </h1>");
    }
}
