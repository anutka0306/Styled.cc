<?php

namespace App\Controller\Admin;

use App\Form\PageGeneratorType;
use App\Service\PageGeneratorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PageGeneratorController extends AbstractController
{
    /**
     * @Route("/admin/page-generator", name="admin_page_generator")
     */
    public function index(Request $request,PageGeneratorService $page_generator_service)
    {
        $form = $this->createForm(PageGeneratorType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $modified_pages = $page_generator_service->generateByPageGeneratorModel($data);
            $this->addFlash('info',"Обновлено страниц: {$modified_pages}");
        }
        return $this->render('admin/page_generator/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
