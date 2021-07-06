<?php

namespace App\Controller;

use App\Adapter\RssNewsAdapter;
use App\Entity\News;
use App\Repository\ContentRepository;
use App\Repository\NewsRepository;
use App\Form\SalonFilterType;
use App\Service\SalonManager;
use PhpProgrammist\YandexTurboRssGeneratorBundle\Adapters\BasePage;
use PhpProgrammist\YandexTurboRssGeneratorBundle\YandexTurboRssGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news", name="news_")
 */
class NewsController extends AbstractController
{
    /**
     * @var NewsRepository
     */
    protected $news_repository;
    /**
     * @var ContentRepository
     */
    protected $content_repository;
    /**
     * @var YandexTurboRssGenerator
     */
    protected $rss_generator;
    /**
     * @var SalonManager
     */
    protected $salon_manager;

    public function __construct(
        NewsRepository $news_repository,
        ContentRepository $content_repository,
        YandexTurboRssGenerator $rss_generator,
        SalonManager $salon_manager
    ) {
        $this->news_repository     = $news_repository;
        $this->content_repository  = $content_repository;
        $this->rss_generator       = $rss_generator;
        $this->salon_manager = $salon_manager;
    }
    /**
     * @Route("/", name="index")
     */
    public function index(NewsRepository $news_repository, ContentRepository $content_repository, Request $request)
    {
        $page = $content_repository->findOneByToken('news');
        $news_list = $news_repository->findBy([],['sort'=>'asc','date'=>'desc']);

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/news/index.html.twig', [
            'page' => $page,
            'items' => $news_list,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }

    /**
     * @Route("/{id}/", name="item",requirements={"id" = "\d+"})
     * @param News $news
     * @param Request $request
     * @return Response
     */
    public function item(News $news, Request $request)
    {

        $form = $this->createForm(
            SalonFilterType::class,
            null,
            ['method' => 'GET', 'priceBrand' => null]
        );
        $form->handleRequest($request);

        $availableSalons = $this->salon_manager->getSalonsByFilterForm($form, null);

        return $this->render('v2/pages/news/item.html.twig', [
            'page' => $news,
            'item' => $news,
            'form' => $form->createView(),
            'availableSalons' => $availableSalons,
        ]);
    }
    
    /**
     * @Route("/rss.xml", name="rss")
     */
    public function rss()
    {
        $items     = $this->news_repository->findAll();
        $base_page_entity = $this->content_repository->findOneBy(['path' => '/news/']);
        $base_page = new BasePage($base_page_entity->getName(),$base_page_entity->getMetaDescription(),$base_page_entity->getPath());
        $adapter   = new RssNewsAdapter($items, $base_page);
        
        return $this->rss_generator->render($adapter, $base_page);
    }
}
