<?php

namespace App\Service;

use App\Repository\DistrictRepository;
use App\Repository\CountyRepository;
use App\Repository\SubwayStationRepository;
use Symfony\Component\HttpFoundation\Request;

class LocationService
{
    /**
     * @var DistrictRepository
     */
    protected $district_repository;
    /**
     * @var CountyRepository
     */
    protected $county_repository;
    /**
     * @var SubwayStaionRepository
     */
    protected $subway_staion_repository;

    public function __construct(
        DistrictRepository $district_repository,
        CountyRepository $county_repository,
        SubwayStationRepository $subway_station_repository
    ) {
        $this->district_repository       = $district_repository;
        $this->county_repository         = $county_repository;
        $this->subway_station_repository = $subway_station_repository;
    }

    public function getLocation(Request $request)
    {
        $query = $request->query->all();
        if (array_key_exists('district', $query)) {
            return $this->district_repository->findOneBy(['code' => str_replace('rayon-', '',$query['district'])]) ?? null;
        } elseif (array_key_exists('subwayStation', $query)) {
            return $this->subway_station_repository->findOneBy(['code' => $query['subwayStation']]) ?? null;
        } elseif (array_key_exists('county', $query)) {
            return $this->county_repository->findOneBy(['code' => str_replace('okrug-', '', $query['county'])]) ?? null;
        }
        return null;
    }
}