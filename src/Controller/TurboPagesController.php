<?php


namespace App\Controller;


use App\Adapter\RssServiceAdapter;
use App\Entity\Content;
use App\Repository\ContentRepository;
use App\Repository\ServiceRepository;
use PhpProgrammist\YandexTurboRssGeneratorBundle\Adapters\BasePage;
use PhpProgrammist\YandexTurboRssGeneratorBundle\YandexTurboRssGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class TurboPagesController extends AbstractController
{

    /**
     * @Route("/services-{page}.xml", name="rss_services",format="xml",requirements={"page"="\d+"})
     * @param int $page
     * @param RssServiceAdapter $adapter
     * @param ContentRepository $contentRepository
     * @param ServiceRepository $serviceRepository
     * @param YandexTurboRssGenerator $generator
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function rssServices(
        int $page,
        RssServiceAdapter $adapter,
        ContentRepository $contentRepository,
        ServiceRepository $serviceRepository,
        YandexTurboRssGenerator $generator,
        PaginatorInterface $paginator
    ): Response
    {

        $items = $paginator->paginate(
            $serviceRepository->findAllQuery(),
            $page,
            1000
        );
        /** @var Content $base_page_entity */
        $base_page_entity = $contentRepository->findOneBy(['path' => '/']);

        $base_page        = new BasePage(
            $base_page_entity->getName(),
            $base_page_entity->getMetaDescription(),
            $base_page_entity->getPath()
        );

        $adapter
            ->setBasePage($base_page)
            ->setOriginalItems($items);

        return $generator->render($adapter, $base_page);
    }
}