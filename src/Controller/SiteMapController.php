<?php

namespace App\Controller;

use App\Entity\Content;
use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\County;
use App\Entity\District;
use App\Entity\SubwayStation;
use App\Service\SiteMapService;
use App\Model\SiteMapModel;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteMapController extends AbstractController
{
    
    /**
     * @var ParameterBagInterface
     */
    protected $params;
    /**
     * @var Filesystem
     */
    protected $filesystem;
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    /**
     * @var PaginatorInterface
     */
    protected $paginator;
    
    public function __construct(ParameterBagInterface $params, Filesystem $filesystem, EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $this->params = $params;
        $this->filesystem = $filesystem;
        $this->em = $em;
        $this->paginator = $paginator;
    }
    
    /**
     * @Route("/sitemap_generator", name="sitemap_generator")
     */
    public function generator(SiteMapModel $model)
    {
        $project_dir = $this->params->get('kernel.project_dir');
        $public_folder = $project_dir.'/public_html';
        $parts_folder_name = 'sitemap_parts';
        $parts_folder = $public_folder.'/'.$parts_folder_name;
        $batches = $model->getPagesBatches();
        if (count($batches) === 1) {
            $sitemap = $this->renderView('sitemap/index.xml.twig', [
                'pages' => current($batches),
            ]);
        }else{
            $sitemap = $this->renderView('sitemap/index_splinted.xml.twig', [
                'files' => array_keys($batches),
                'parts_folder_name' => $parts_folder_name
            ]);
            foreach ($batches as $file => $batch) {
                $part_file = $this->renderView('sitemap/index.xml.twig', [
                    'pages' => $batch,
                ]);
                $this->filesystem->dumpFile($parts_folder.'/'.$file,$part_file);
            }
        }
        $this->filesystem->dumpFile($public_folder.'/sitemap.xml',$sitemap);
        return new Response('Sitemap generated');
    }

    /**
     * @Route("/sitemap_generator_loc", name="sitemap_generator_loc")
     */
    public function generator_loc(SiteMapService $generator)
    {
        $project_dir = $this->params->get('kernel.project_dir');
        $public_folder = $project_dir.'/public_html';
        $parts_folder_name = 'sitemap_parts';
        $parts_folder = $public_folder.'/'.$parts_folder_name;
        $generator->generateSitemap($public_folder, $parts_folder_name, $parts_folder);

        return new Response('Sitemap generated');
    }

    /**
     * @Route("/sitemap/", name="sitemap_index")
     */
    public function index(Request $request)
    {
        $page = $this->em->getRepository(Content::class)->findOneBy(['path'=>'/sitemap/']);

        if (null === $page) {
            throw $this->createNotFoundException();
        }
        $query = $this->em->createQuery("SELECT a FROM App\Entity\Content as a WHERE a.published = 1 ORDER BY a.id");
        $pagination = $this->paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            500 /*limit per page*/
        );

        $counties = $this->em->getRepository(County::class)->findWithNotEmptySalons();

        $districts = $this->em->getRepository(District::class)->findWithNotEmptySalons();

        /*$districtUrls = array_map(function ($district) {
                return $district->getPath();
            }, $districts);

        $subwayStations = array_filter(
            $this->em->getRepository(SubwayStation::class)->findWithNotEmptySalons(),
            function ($subwayStation) use ($districtUrls) {
            return !in_array($subwayStation->getPath(), $districtUrls);
        });*/

        $subwayStations = $this->em->getRepository(SubwayStation::class)->findWithNotEmptySalons();

        // parameters to template
        return $this->render(
            'sitemap/index.html.twig',
            compact('pagination', 'page', 'counties', 'districts', 'subwayStations')
        );
    }

    /**
     * @Route("/sitemap/{location}/", name="sitemap_location")
     */
    public function item($location, Request $request)
    {
        $page = $this->em->getRepository(Content::class)->findOneBy(['path'=>'/sitemap/']);

        if (null === $page) {
            throw $this->createNotFoundException();
        }
        $district = $this->em->getRepository(District::class)->findOneBy(['code' => $location]);
        $subwayStation = $this->em->getRepository(SubwayStation::class)->findOneBy(['code' => $location]);

        $main = $this->em->getRepository(Content::class)->findOneBy(['path'=>'/']);
        $brands = $this->em->getRepository(Brand::class)->findBy(['published' => true]);
        $models = $this->em->getRepository(Model::class)->findBy(['published' => true]);
        $rootServices = $this->em->getRepository(RootService::class)->findBy(['published' => true]);
        $services = $this->em->getRepository(Service::class)->findBy(['published' => true]);
        $pages = array_merge([$main], $brands, $models, $rootServices, $services);

        if ($district && count($district->getSalons()) > 0) {
            $location = $district;
        } elseif ($subwayStation && count($subwayStation->getSalons()) > 0) {
            $location = $subwayStation;
        } else {
            throw $this->createNotFoundException();
        }

        $page->setLocation($location);
        $locationPages =  array_map(function ($page) use ($location) {
                $newPage = clone $page;
                $newPage->setLocation($location);
                $newPage->setPath($page->getPath() . $location->getPath() . '/');
                return $newPage;
            }, $pages);

        $pagination = $this->paginator->paginate(
            $locationPages,
            $request->query->getInt('page', 1), /*page number*/
            500 /*limit per page*/
        );

        // parameters to template
        return $this->render('sitemap/index_location.html.twig', compact('pagination', 'page'));
    }
}
