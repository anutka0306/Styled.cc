<?php

namespace App\Controller\Admin\Import;

use App\Form\ImagesDownloadType;
use App\Repository\NaschirabotyRepository;
use App\Service\FileManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImagesDownloadController extends AbstractController
{
    /**
     * @Route("/admin/import/images-download", name="admin_import_images_download_index")
     */
    public function index(Request $request,FileManager $fileManager)
    {
        $form = $this->createForm(ImagesDownloadType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $links = explode("\r\n",$formData['links']);
            foreach ($links as $link) {
                $fileManager->download($link,'/img/'.$formData['folder']);
            }
            $this->addFlash('success',sprintf('Скачано %d изображений',count($links)));
        }
        return $this->render('admin/import/images-download/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/admin/import/images-download/naschiraboty", name="admin_import_images_download_naschiraboty")
     */
    public function naschiraboty(FileManager $fileManager, NaschirabotyRepository $repository)
    {
        $items = $repository->findAll();
        $counter = 0;
        foreach ($items as $item) {
            $images = $item->getImagesArray();
            foreach ($images as $image) {
                $link = 'https://fuelfuture.ru/img/naschiraboty/original/'.$image;
                $fileManager->download($link,$item->getImgFolder());
                $counter++;
            }
        }
        return new Response($counter);
    }

}
