<?php

namespace App\Controller;

use App\Entity\Video;
use App\Entity\VideoCategory;
use App\Form\SalonFilterType;
use App\Service\SalonManager;
use App\Repository\ContentRepository;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
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
     * @Route("/videoblog/", name="videoblog_index")
     * @param EntityManagerInterface $em
     * @param ContentRepository $content_repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(
        VideoRepository $videoRepository,
        ContentRepository $content_repository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $page = $content_repository->findOneByToken('videoblog');
        $pagination = $paginator->paginate(
            $videoRepository->getQuery(),
            $request->query->getInt('page', 1),
            10
        );
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);
        return $this->render('v2/pages/video/index.html.twig', [
            'page' => $page,
            'pagination' => $pagination,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }

    /**
     * @Route("/videoblog/{alias}/", name="videoblog_category")
     * @param VideoCategory $category
     * @param VideoRepository $videoRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function category(
        VideoCategory $category,
        VideoRepository $videoRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $pagination = $paginator->paginate(
            $videoRepository->getQuery($category),
            $request->query->getInt('page', 1),
            10
        );
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/video/index.html.twig', [
            'page' => $category,
            'pagination' => $pagination,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }

    /**
     * @Route("/videoblog/{categoryAlias}/{id}", name="videoblog_item")
     * @param string $categoryAlias
     * @param Video $video
     * @return Response
     */
    public function item(string $categoryAlias, Video $video, Request $request): Response
    {
        if (!$video->getCategory() || $video->getCategory()->getAlias() !== $categoryAlias) {
            throw $this->createNotFoundException();
        }
        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/video/item.html.twig', [
            'page' => $video,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
}
