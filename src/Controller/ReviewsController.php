<?php

namespace App\Controller;

use App\Form\SalonFilterType;
use App\Service\SalonManager;
use App\Entity\Reviews;
use App\Repository\ContentRepository;
use App\Repository\ReviewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewsController extends AbstractController
{
    /**
     * @var SalonManager
     */
    protected $salon_manager;

    public function __construct(SalonManager $salon_manager)
    {
        $this->salon_manager = $salon_manager;
    }

    /**
     * @Route("/reviews/", name="reviews_index")
     * @param ReviewsRepository $reviews_repository
     * @param ContentRepository $content_repository
     * @param Request $request
     * @return Response
     */
    public function index(ReviewsRepository $reviews_repository, ContentRepository $content_repository, Request $request): Response
    {
        $page = $content_repository->findOneByToken('reviews');
        $reviews = $reviews_repository->findBy(['published'=>1],['date'=>'desc']);

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/reviews/index.html.twig', [
            'page' => $page,
            'items' => $reviews,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }

    /**
     * @Route("/reviews/{id}/", name="reviews_item",requirements={"id" = "\d+"})
     * @param Reviews $review
     * @param Request $request
     * @return Response
     */
    public function item(Reviews $review, Request $request): Response
    {
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/reviews/item.html.twig', [
            'page' => $review,
            'item' => $review,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
}
