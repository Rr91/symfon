<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    /**
     * @Route("/video", name="video")
     */
    public function index(): Response
    {
        $videos = $this->getDoctrine()->getRepository(Video::class)->findAll();
        dump($videos[0]['title']); die();
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
            'videos' => $videos,
        ]);
    }

    /**
     * @Route("/add_video", name="add_video")
     */
    public function addVideo(): Response
    {
        return $this->render('video/add_video.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }

    /**
     * @Route("/one_video/{id}", name="one_video")
     */
    public function oneVideo($id): Response
    {
        $video = $this->getDoctrine()->getRepository(Video::class)->findBy(['id' => $id]);
        return $this->render('video/one_video.html.twig', [
            'controller_name' => 'VideoController',
            'video' => $video[0],
        ]);
    }

    /**
     * @Route("/by_category/{category_id}", name="by_category", requirements={"category_id" = "\d"})
     */
    public function byCategory($category_id): Response
    {
//        $videos = $this->getDoctrine()->getRepository(Video::class)->findBy(['category_id' => $category_id], ['title' => 'ASC']);
        $videos = $this->getDoctrine()->getRepository(Video::class)->findByCategory($category_id);
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
            'videos' => $videos,
        ]);
    }


}
