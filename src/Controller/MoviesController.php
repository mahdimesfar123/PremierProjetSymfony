<?php

namespace App\Controller;

use App\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MoviesController extends AbstractController
{
    /**
     * @Route("/moviescontroller", name="Movies")
     */
    public function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $movies = new Movies();

        $form = $this->createFormBuilder($movies)
            ->add('Title', TextType::class)
            ->add('StartTime', TimeType::class)
            ->add('EndTime', TimeType::class)
        ;
    }
}
