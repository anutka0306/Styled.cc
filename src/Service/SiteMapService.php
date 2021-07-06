<?php

namespace App\Service;

use Twig\Environment;
use App\Dto\PageDto;
use App\Model\SimpleSiteMapModel;
use App\Repository\CountyRepository;
use App\Repository\DistrictRepository;
use App\Repository\SubwayStationRepository;
use App\Repository\ContentRepository;
use App\Repository\FaqRepository;
use App\Repository\NaschirabotyRepository;
use App\Repository\NewsRepository;
use App\Repository\ReviewsRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Filesystem\Filesystem;

class SiteMapService
{
    /**
     * @var CountyRepository
     */
    protected $county_repository;
    /**
     * @var DistrictRepository
     */
    protected $district_repository;
    /**
     * @var SubwayStationRepository
     */
    protected $subway_station_repository;
    /**
     * @var SimpleSiteMapModel[]
     */
    private $site_map_names = [];
    /**
     * @var SimpleSiteMapModel
     */
    private $current_site_map;
    /**
     * @var Environment
     */
    private $twig;

    const URL_LIMIT = 50000;
    const PART_FILE_BASE_NAME = 'sitemap';
    private $url_counter = 0;
    private $file_counter = 1;
    private $public_folder;
    private $parts_folder_name;
    private $parts_folder;
    
    public function __construct(
        ContentRepository $content_repository,
        NaschirabotyRepository $works_repository,
        NewsRepository $news_repository,
        ReviewsRepository $reviews_repository,
        FaqRepository $faq_repository,
        CountyRepository $county_repository,
        DistrictRepository $district_repository,
        SubwayStationRepository $subway_station_repository,
        UrlGeneratorInterface $urlGenerator,
        Filesystem $filesystem,
        Environment $twig
    ) {
        $this->content_repository            = $content_repository;
        $this->works_repository              = $works_repository;
        $this->news_repository               = $news_repository;
        $this->reviews_repository            = $reviews_repository;
        $this->faq_repository                = $faq_repository;
        $this->county_repository             = $county_repository;
        $this->district_repository           = $district_repository;
        $this->subway_station_repository     = $subway_station_repository;
        $this->urlGenerator                  = $urlGenerator;
        $this->filesystem                    = $filesystem;
        $this->twig                          = $twig;
    }
    
    public function generateSitemap($public_folder, $parts_folder_name, $parts_folder)
    {
        $fileName = self::PART_FILE_BASE_NAME.$this->file_counter.'.xml';
        $this->current_site_map = new SimpleSiteMapModel($fileName);
        $this->public_folder = $public_folder;
        $this->parts_folder_name = $parts_folder_name;
        $this->parts_folder = $parts_folder;

        $this->addContentPages();
        $this->addWorksPages();
        $this->addNewsPages();
        $this->addReviewsPages();
        $this->addFaqPages();
        $this->addLocationPages();

        $this->saveFullSiteMap();
    }

    private function addContentPages()
    {
        $pages    = $this->content_repository->findBy(['published'=>true], ['id' => 'asc']);
        $excluded = ['/404/'];
        foreach ($pages as $page) {
            if (in_array($page->getPath(), $excluded)) {
                continue;
            }
            $this->addPage($page->getPath(), $page->getModifyDate());
        }
    }
    
    private function addWorksPages()
    {
        $pages = $this->works_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path = $this->urlGenerator->generate('naschiraboty_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addNewsPages()
    {
        $pages = $this->news_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path = $this->urlGenerator->generate('news_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addReviewsPages()
    {
        $pages = $this->reviews_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path = $this->urlGenerator->generate('reviews_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }
    
    private function addFaqPages()
    {
        $pages = $this->faq_repository->findBy([], ['id' => 'asc']);
        foreach ($pages as $page) {
            $path = $this->urlGenerator->generate('faq_item', ['id' => $page->getId()]);
            $this->addPage($path, $page->getModifyDate());
        }
    }

    private function addLocationPages()
    {
        $pages = $this->content_repository->findBy(['published'=>true], ['id' => 'asc']);

        $counties = $this->county_repository->findWithNotEmptySalons();
        $countyUrls = array_map(function ($county) {
            return $county->getPath();
        }, $counties);

        $districts = $this->district_repository->findWithNotEmptySalons();
        $districtUrls = array_map(function ($district) {
            return $district->getPath();
        }, $districts);

        /*$subwayStations = array_filter(
            $this->subway_station_repository->findWithNotEmptySalons(),
            function ($subwayStation) use ($districtUrls) {
            return !in_array($subwayStation->getPath(), $districtUrls);
        });*/
        $subwayStations = $this->subway_station_repository->findWithNotEmptySalons();
        $subwayStationUrls = array_map(function ($subwayStation) {
            return $subwayStation->getPath();
        }, $subwayStations);

        foreach ($pages as $page) {
            foreach ($countyUrls as $countyUrl) {
                $path = $page->getPath() . $countyUrl . '/';
                $this->addPage($path, $page->getModifyDate());
            }
            foreach ($districtUrls as $districtUrl) {
                $path = $page->getPath() . $districtUrl . '/';
                $this->addPage($path, $page->getModifyDate());
            }
            foreach ($subwayStationUrls as $subwayStationUrl) {
                $path = $page->getPath() . $subwayStationUrl . '/';
                $this->addPage($path, $page->getModifyDate());
            }
        }
    }
    
    private function addPage($path, $modifyDate)
    {
        $this->url_counter++;
        if ($this->url_counter > self::URL_LIMIT) {
            $this->file_counter++;
            $this->url_counter = 1;
            $this->site_map_names[] = $this->current_site_map->getPartFileName();
            $this->saveSiteMap();

            $fileName = self::PART_FILE_BASE_NAME.$this->file_counter.'.xml';
            $this->current_site_map = new SimpleSiteMapModel($fileName);
        }
        $this->current_site_map->addPage($path,$modifyDate);
    }

    private function saveSiteMap()
    {
        $part_file = $this->getView();
        $path = $this->parts_folder . DIRECTORY_SEPARATOR . $this->current_site_map->getPartFileName();
        $this->filesystem->dumpFile($path, $part_file);
    }

    private function saveFullSiteMap()
    {
        //сохраниение полной карты сайта
        if (count($this->site_map_names) == 0) {
            //$fullSiteMapView = $this->current_site_map->getView($this->twig);
            $fullSiteMapView = $this->getView();
        } else {
            //сохранение последней карты
            if (!empty($this->current_site_map)) {
                $this->site_map_names[] = $this->current_site_map->getPartFileName();
                $this->saveSiteMap();
            }
            //сохранение полной карты
            $fullSiteMapView = $this->getMainView();
        }
        $path = $this->public_folder . DIRECTORY_SEPARATOR . self::PART_FILE_BASE_NAME . '.xml';
        $this->filesystem->dumpFile($path, $fullSiteMapView);
    }

    public function getView()
    {
        return $this->twig->render('sitemap/index.xml.twig', [
                'pages' => $this->current_site_map->getPages()
            ]);
    }

    public function getMainView()
    {
        return $this->twig->render('sitemap/index_splinted.xml.twig', [
                'files' => $this->site_map_names,
                'parts_folder_name' => $this->parts_folder_name
            ]);
    }
}