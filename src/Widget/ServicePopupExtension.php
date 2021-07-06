<?php

namespace App\Widget;

use App\Entity\Contracts\PageInterface;
use App\Repository\CountyRepository;
use App\Repository\DistrictRepository;
use App\Repository\SubwayStationRepository;
use App\Entity\Service;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ServicePopupExtension extends AbstractExtension
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
    
    public function __construct(CountyRepository $county_repository, DistrictRepository $district_repository, SubwayStationRepository $subway_station_repository)
    {
        $this->county_repository = $county_repository;
        $this->district_repository = $district_repository;
        $this->subway_station_repository = $subway_station_repository;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('service_popup', [$this, 'service_popup'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('service_popup_link', [$this, 'service_popup_link'],['needs_environment' => false, 'is_safe' => ['html']]),
        ];
    }

    public function service_popup(Environment $twig, PageInterface $page = null)
    {
        if (!$page || !$page->getShowLocation()) {
            return '';
        }
        if ($page->getPath() === '/' ||
            $page instanceof Service ||
            $page instanceof RootService ||
            $page instanceof Brand ||
            $page instanceof Model)
        {
            $counties = array_filter($this->county_repository->findAll(), function($county) {
                return count($county->getSalons()) > 0;
            });
            $districts = array_filter($this->district_repository->findAll(), function($district) {
                return count($district->getSalons()) > 0;
            });
            $subwayStations = array_filter($this->subway_station_repository->findAll(), function($subwayStation) {
                return count($subwayStation->getSalons()) > 0;
            });

            return $twig->render('v2/widget/service_popup.html.twig',compact('page', 'counties', 'districts', 'subwayStations'));
        } 
        return '';
    }

    public function service_popup_link(PageInterface $page = null)
    {
        if (!$page || !$page->getShowLocation()) {
            return '';
        }
        if ($page->getPath() === '/' ||
            $page instanceof Service ||
            $page instanceof RootService ||
            $page instanceof Brand ||
            $page instanceof Model)
        {
            return ', <a class="uk-visible@s" href="#modal-services" uk-toggle>Точки обслуживания</a>';
        } 
        return '';
    }
}
