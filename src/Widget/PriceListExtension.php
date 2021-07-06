<?php

namespace App\Widget;

use App\Entity\Content;
use App\Entity\Service;
use App\Model\PriceListModel;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use App\Entity\ServiceEntityReedInterface;

class PriceListExtension extends AbstractExtension
{
    /**
     * @var PriceListModel
     */
    protected $model;
    /**
     * @var AdapterInterface
     */
    protected $cache;
    
    public function __construct(PriceListModel $model, AdapterInterface $cache)
    {
        
        $this->model = $model;
        $this->cache = $cache;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('price_list_turbo', [$this, 'price_list_turbo'], ['needs_environment'=> true, 'is_safe' => ['html']]),
            new TwigFunction('price_list', [$this, 'price_list'], ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('price_blocks', [$this, 'price_blocks'], ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('price_list_full', [$this, 'price_list_full'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }
    
    public function price_list(Environment $twig, Content $page)
    {
        $sections = $this->model->getSectionsByPage($page);
        if ( empty($sections) ) {
            return '';
        }
        $price_list_title = $this->model->getPricelistTitle();
        
        return $twig->render('v2/widget/price_list.html.twig', compact('sections', 'price_list_title','page'));
    }
    public function price_list_turbo(Environment $twig, ServiceEntityReedInterface $page)
    {
        /*if (!$section = $this->model->getSectionsByPageTurbo($page)) {
            return '';
        }*/
        $sections = $this->model->getSectionsByPage($page);
        if ( empty($sections) ) {
            return '';
        }
        $price_list_title = $this->model->getPricelistTitle();
        return $twig->render('v2/turbo/service/price.html.twig',compact('sections','price_list_title','page'));
    }
    
    public function price_blocks(Environment $twig, Service $service)
    {
        $price_service = $service->getService();
        if (null === $price_service) {
            return '';
        }
        $price_service->setPriceByContent($service);
        $brand_model_name = $service->getBrandAndModelName();
        
        return $twig->render('v1/widget/price_blocks.html.twig', compact('brand_model_name', 'price_service'));
    }
    
    public function price_list_full(Environment $twig, Content $page)
    {
        $location = $page->getLocation();
        $itemName = $location ? 'price_list_full' . '-' . $location->getPath() : 'price_list_full';
        $item = $this->cache->getItem($itemName);
        if ( ! $item->isHit()) {
            $sections = $this->model->getAllSections();
            if ( ! $sections) {
                return '';
            }
            $html = $twig->render('v2/widget/price_list_full.html.twig', compact('sections', 'page'));
            $item->set($html);
            $this->cache->save($item);
        }
        
        return $item->get();
    }
}
