<?php

namespace App\Controller;

use App\Entity\Faq;
use App\Repository\ContentRepository;
use App\Repository\FaqRepository;
use App\Form\SalonFilterType;
use App\Service\SalonManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
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
     * @Route("/faq/", name="faq")
     * @param FaqRepository $faq_repository
     * @param ContentRepository $content_repository
     * @param Request $request
     * @return Response
     */
    public function index(FaqRepository $faq_repository, ContentRepository $content_repository, Request $request): Response
    {
        $page = $content_repository->findOneByToken('faq');
        $items = $faq_repository->findBy(['published' =>1],['date' =>'desc']);

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/faq/index.html.twig', [
            'page' => $page,
            'items' => $items,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }

    /**
     * @Route("/faq/{id}/", name="faq_item",requirements={"id" = "\d+"})
     * @param Faq $faq
     * @param Request $request
     * @return Response
     */
    public function item(Faq $faq, Request $request): Response
    {
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/faq/item.html.twig', [
            'page' => $faq,
            'item' => $faq,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
}
