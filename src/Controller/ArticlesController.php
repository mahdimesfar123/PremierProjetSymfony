<?php

namespace App\Controller;

use App\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_route")
     */
    public function showArticles(): Response
    {
        $articles= $this->getDoctrine()->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
    * @Route("/articles/{id}", name="article_show")
    */
    public function show($id) {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render('articles/show.html.twig',array('article' => $article));
    }
    /**
     * @Route("/article/new", name="article_add")
     */
    public function addArticle(EntityManagerInterface $entityManager): Response
    {

        $article = new Article();
        $article->setDesignation("test1");
        $article->setDescription("test1 Description");
        $article->setPrix("30");
    
        $entityManager->persist($article);
        $entityManager->flush();
        return $this->redirectToRoute('articles_route');
    }
        /**
     * @Route("/article/edit/{id}", name="article_edit")
     */
    public function editArticle(Article $article,EntityManagerInterface $entityManager)
    {
        if (!$article) {
            throw $this->createNotFoundException('Article non trouvée avec l\'id'.$article->id);
        }
        $article->setDesignation("test2");
        $article->setDescription("test2 Description");
        $article->setPrix("40");
    
        $entityManager->persist($article);
        $entityManager->flush();
        $url = $this->generateUrl('article_show', ['id'=>$article->getId()]);
        return $this->redirect($url);
    }
    /**
    * @Route("/article/delete/{id}",name="delete_movie")
    */
    public function delete(Request $request, $id) {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        
        $response = new Response();
        $response->send();
        return $this->redirectToRoute('articles_route');
    }
}
