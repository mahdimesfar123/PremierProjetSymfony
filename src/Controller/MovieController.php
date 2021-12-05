<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Session\Session;

class MovieController extends AbstractController
{

    /**
     * @Route("/movie", name="create_movie")
     * @param Request $request
     * @return Response
     */
    public function createMovieRequest (Request $request): Response
    { $session = $this->get('session');
        $moviesArray = $session->get('moviesArray');
        if ($request->getMethod() == Request::METHOD_POST){
            $name = $request->get('_movie_name');
            $room = $request->request->get('_room_name');
            $start =  $request->request->get('_start_time');
            $end = $request->request->get('_finish_time');
            $input = array('name'=>$name,'room'=>$room,'start'=>$start,'end'=>$end);
             $moviesArray[]=$input;
            $session->set('moviesArray',$moviesArray);
            return $this->render('movie/index.html.twig', [
               'moviesArray' => $moviesArray,

            ]);;

        }else  return $this->render('movie/index.html.twig');
    }




    }

































