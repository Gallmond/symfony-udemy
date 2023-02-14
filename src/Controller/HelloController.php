<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return new Response('HIYA');
    }

    #[Route('/hasParam/{id<\d+>?0}', name: 'hasParams')]
    public function hasParams(int $id): Response
    {
        $isDefault = $id === 0;

        return new Response("Param is: $id" . ($isDefault ? ' (Default)' : ''));
    }

    #[Route('/hasTemplate/{id<\d+>?1}', name: 'hasTemplate')]
    public function hasTemplate(int $id): Response
    {
        $this->render('hello/hasTemplate.html.twig', [
            'id' => $id
        ]);
    }

}