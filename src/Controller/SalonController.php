<?php

namespace App\Controller;

use App\Service\SalonManager;
use App\Entity\Salon;
use App\Entity\WorkingDay;
use App\Entity\DayOfWeek;
use App\Form\SalonType;
use App\Form\SalonFilterType;
use App\Repository\SalonRepository;
use App\Repository\ContentRepository;
use App\Repository\DayOfWeekRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salon")
 */
class SalonController extends AbstractController
{
    /**
     * @var ContentRepository
     */
    protected $page_repository;

    /**
     * @var SalonRepository
     */
    protected $salon_repository;

    /**
     * @var SalonManager
     */
    protected $salon_manager;

    /**
     * @var DayOfWeekRepository
     */
    protected $day_of_week_repository;
    
    public function __construct(ContentRepository $page_repository, SalonRepository $salonRepository, SalonManager $salon_manager, DayOfWeekRepository $day_of_week_repository)
    {
        $this->page_repository = $page_repository;
        $this->salon_repository = $salonRepository;
        $this->salon_manager = $salon_manager;
        $this->day_of_week_repository = $day_of_week_repository;
    }

    /**
     * @Route("/new/", name="salon_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        /** @var UploadedFile */
        $token = 'salon/new';
        if ( ! $page = $this->page_repository->findOnePublishedByToken($token)) {
            throw $this->createNotFoundException(sprintf('Page %s not found',$token));
        }
        $salon = new Salon();
        // dummy code - add some example tags to the task
        // (otherwise, the template will render an empty list of tags)
        $dayOfWeeks = $this->day_of_week_repository->findAll();
        $workingDays = [];
        foreach ($dayOfWeeks as $dayOfWeek) {
            $workingDay = new WorkingDay();
            $workingDay->setDayOfWeek($dayOfWeek);
            $workingDays[] = $workingDay;
            $salon->addWorkingDay($workingDay);
        }

        // end dummy code

        $form = $this->createForm(SalonType::class, $salon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            foreach ($workingDays as $workingDay) {
                $entityManager->persist($workingDay);
            }
            $entityManager->persist($salon);
            $entityManager->flush();

            $image_file = $request->files->get('file');
            $image_files = $form->get('file')->getData();
            $root_folder = $request->server->get('DOCUMENT_ROOT');
            $img_folder = $salon->getImgFolder();
            if (!empty($image_files)) {
                foreach ($image_files as $image_file) {
                    # code...

                    $file_name = $image_file->getClientOriginalName();
                    $folder = $root_folder.'/'.ltrim($img_folder,' /');
                    try{
                        if ($image_file->move($folder, $file_name)) {
                            $response = ['status' => 'OK', 'message' => 'Загружено'];
                            $images_config = $this->configs->getCachedGroup('images');
                            
                            $watermark = $images_config['watermark']?$root_folder.'/'.$images_config['watermark']:null;
                            $max_width = $images_config['max_width']??null;
                            $quality = $images_config['quality']??null;
                            $this->image_processor->processImage($folder.'/'.$file_name,$max_width,null,$watermark,$quality);
                        }
                        else{
                            $response = ['status' => 'ERROR', 'message' => 'Ошибка при сохранении файла на диск'];
                        }
                    } catch (\Exception $e){
                        $response = ['status' => 'ERROR', 'message' => $e->getMessage()];
                    }
                }
            }
            return $this->redirectToRoute('home');
        }

        return $this->render('salon/new.html.twig', [
            'page' => $page,
            'salon' => $salon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/filter/", name="salon_filter", methods={"GET"})
     */
    public function filter(ContentRepository $repository, Request $request): Response
    {
    	$page = $repository->findOneBy(['path'=>'/acura/']);

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => $page->getPriceBrand()]
        );

        $form->handleRequest($request);
        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, $page->getPriceBrand());

        return $this->render('v2/pages/test.html.twig', [
            'page' => $page,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
}
