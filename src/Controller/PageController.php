<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="page")
     */
    public function index(): Response
    {
//        $entityManager = $this->getDoctrine()->getManager();
//        $page = new Page();
//        $page->setKeywords('Video')->setDescription('Video d')
//            ->setTitle('Video t')->setContent('видео c');
//
//        $entityManager->persist($page);
//        $entityManager->flush();

        $homePage = $this->getDoctrine()->getRepository(Page::class)->find(2);
//        dump($homePage);die();
        return $this->render('page/index.html.twig', [
            'homePage' => $homePage,
        ]);
    }
}
