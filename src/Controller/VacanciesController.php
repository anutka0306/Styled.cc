<?php

namespace App\Controller;

use App\Form\SalonFilterType;
use App\Service\SalonManager;
use App\Repository\ContentRepository;
use App\Repository\VacancyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VacanciesController extends AbstractController
{
    /**
     * @Route("/vacancies/", name="vacancies_index")
     */
    public function index(
        VacancyRepository $vacancy_repository,
        ContentRepository $content_repository,
        SalonManager $salon_manager,
        Request $request
    ) {
        $page = $content_repository->findOneByToken('vacancies');
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $salon_manager->getSalonsByFilterForm($form, null);

        $items = $vacancy_repository->findBy(['published' => true]);
        return $this->render('v2/pages/vacancies/index.html.twig', [
            'page' => $page,
            'items' => $items,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
}
