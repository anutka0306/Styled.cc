<?php

namespace App\Twig;

use App\Entity\Contracts\LocationInterface;
use App\Entity\District;
use App\Entity\SubwayStation;
use App\Repository\ContentRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PathExtension extends AbstractExtension
{
    /**
     * @var ContentRepository
     */
    protected $content_repository;

    public function __construct(ContentRepository $content_repository)
    {
        $this->content_repository = $content_repository;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('path_with_location', [$this, 'getPathWithLocation']),
        ];
    }
    
    
    public function getPathWithLocation($path, LocationInterface $location = null):string
    {
        if (empty($path) || !$location) {
            return $path;
        }
        $page = $this->content_repository->findOneBy(['path' => $path]);
        return $page->getShowLocation() ? $path . $location->getPath() . '/' : $path;
    }
}
