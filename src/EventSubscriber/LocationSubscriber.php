<?php

namespace App\EventSubscriber;

use App\Entity\Content;
use App\Entity\Brand;
use App\Entity\Model;
use App\Entity\RootService;
use App\Entity\Service;
use App\Entity\District;
use App\Entity\County;
use App\Entity\SubwayStation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class LocationSubscriber implements EventSubscriberInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        $serverBag = $request->server;
        $requestUri = $serverBag->get('REQUEST_URI');
        $uriParts = explode('/', trim($requestUri, '/'));
        $location = end($uriParts);

        $district = (strpos($location, 'rayon') === 0) ?
            $this->em->getRepository(District::class)->findOneBy(['code' => str_replace('rayon-', '', $location)]) : null;

        $county =(strpos($location, 'okrug') === 0) ?
            $this->em->getRepository(County::class)->findOneBy(['code' => str_replace('okrug-', '', $location)]) : null;

        //$district = $this->em->getRepository(District::class)->findOneBy(['code' => $location]);
        //$county = $this->em->getRepository(County::class)->findOneBy(['code' => $location]);
        $subwayStation = $this->em->getRepository(SubwayStation::class)->findOneBy(['code' => $location]);

        // set location for Brand, Model, Service, Rootservice page types and for Home page
        if ($isShownLocation = $this->isShownLocation($district)) {
            $queryName = 'district';
        } elseif ($isShownLocation = $this->isShownLocation($subwayStation)) {
            $queryName = 'subwayStation';
        } elseif ($isShownLocation = $this->isShownLocation($county)) {
            $queryName = 'county';
        }

        if ($isShownLocation) {
            $newUri = str_replace($location .'/', '', $requestUri);
            $page = $this->em->getRepository(Content::class)->findOneBy(['path' => $newUri, 'published' => true]);
            if ($page && $page->getShowLocation()) {
                if ($newUri === '/') {
                    $serverBag->set('REQUEST_URI', $newUri);
                    $request->query->set($queryName, $location);
                    $request = $request->duplicate(null, null, null, null, null, $serverBag->all(), null);
                } elseif (
                    $page instanceof Brand
                    || $page instanceof Model
                    || $page instanceof Service
                    || $page instanceof RootService
                ) {
                    $serverBag->set('REQUEST_URI', $newUri);
                    $request->query->set($queryName, $location);
                    $request = $request->duplicate(null, null, null, null, null, $serverBag->all(), null);
                }    
            }
        }
    }
    public static function getSubscribedEvents()
    {
        return [
            RequestEvent::class => ['onKernelRequest', 10000]
        ];
    }

    private function isShownLocation($location)
    {
        return ($location && count($location->getSalons()) > 0);
    }
}