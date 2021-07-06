<?php

namespace App\Controller;

use App\Form\SalonFilterType;
use App\Service\SalonManager;
use App\Entity\SpecialOffer;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SpecialOffersController extends AbstractController
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
     * @Route("/akcii/", name="skidki_i_akcii_index")
     * @param ContentRepository $content_repository
     * @return Response
     */
    public function index(ContentRepository $content_repository, Request $request): Response
    {
        $page = $content_repository->findOneByToken('akcii');
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);
        return $this->render('v2/pages/special_offers/index.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }

    /**
     * @Route("/akcii/{slug}/", name="skidki_i_akcii_view")
     * @param SpecialOffer $offer
     * @return Response
     */
    public function view(SpecialOffer $offer, Request $request): Response
    {
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);
        return $this->render('v2/pages/special_offers/view.html.twig', [
            'page' => $offer,
            'offer' => $offer,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
    
}
