<?php

namespace App\Widget;

use App\Entity\PriceBrand;
use App\Entity\PriceModel;
use App\Entity\Contracts\PageInterface;
use App\Repository\PriceBrandRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BrandsModelsExtension extends AbstractExtension
{
    /**
     * @var PriceBrandRepository
     */
    protected $brand_repository;
    /**
     * @var AdapterInterface
     */
    protected $cache;

    public function __construct(PriceBrandRepository $brand_repository, AdapterInterface $cache)
    {
        $this->brand_repository = $brand_repository;
        $this->cache = $cache;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('brands_block', [$this, 'brands_block'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_sedan_hatchback', [$this, 'brands_models_sedan_hatchback'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_crossover', [$this, 'brands_models_crossover'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_suv', [$this, 'brands_models_suv'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('brands_models_popular', [$this, 'brands_models_popular'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_sedan_hatchback', [$this, 'models_sedan_hatchback'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_crossover', [$this, 'models_crossover'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_suv', [$this, 'models_suv'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_van', [$this, 'models_van'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('models_popular', [$this, 'models_popular'],
                ['needs_environment' => true, 'is_safe' => ['html']]),
        ];
    }

    public function brands_block(Environment $twig, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = $location ? 'brands_block' . '-' . $location->getPath() : 'brands_block';
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $items = $this->brand_repository->findBy([], ['name' => 'asc']);
            $html = $twig->render('v2/widget/brands.html.twig', compact('items', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_sedan_hatchback(Environment $twig, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = $location ? 'brands_models_sedan_hatchback' . '-' . $location->getPath() : 'brands_models_sedan_hatchback';
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $brands = $this->getBrandsWithFilteredModels([
                PriceModel::TYPE_SEDAN,
                PriceModel::TYPE_HATCHBACK,
            ]);

            $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_crossover(Environment $twig, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = $location ? 'brands_models_crossover' . '-' . $location->getPath() : 'brands_models_crossover';
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $brands = $this->getBrandsWithFilteredModels([
                PriceModel::TYPE_CROSSOVER,
            ]);

            $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_suv(Environment $twig, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = $location ? 'brands_models_suv' . '-' . $location->getPath() : 'brands_models_suv';
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $brands = $this->getBrandsWithFilteredModels([
                PriceModel::TYPE_SUV,
            ]);

            $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function brands_models_popular(Environment $twig, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = $location ? 'brands_models_popular' . '-' . $location->getPath() : 'brands_models_popular';
        $item = $this->cache->getItem('brands_models_popular');
        if (!$item->isHit()) {//если данное значение не закешировано
            $brands = $this->brand_repository->findAllWithModels();

            foreach ($brands as $brand) {
                $brand->filterPriceModelsByPopular();
            }

            $brands = array_filter($brands, static function (PriceBrand $brand) {
                return count($brand->getPriceModels()) > 0;
            });

            $showLogo = true;

            $html = $twig->render('v2/widget/brands-with-models.html.twig', compact('brands', 'location', 'showLogo'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_sedan_hatchback(Environment $twig, PriceBrand $brand, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = 'models_sedan_hatchback' . $brand->getName() ;
        if ($location) {
            $itemName .= $location->getPath();
        }
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $models = $brand->filterPriceModelsByTypes([
                PriceModel::TYPE_SEDAN,
                PriceModel::TYPE_HATCHBACK,
            ], false);
            $html = $twig->render('v2/widget/models.html.twig', compact('models', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_crossover(Environment $twig, PriceBrand $brand, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = 'models_crossover' . $brand->getName() ;
        if ($location) {
            $itemName .= $location->getPath();
        }
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $models = clone $brand->filterPriceModelsByTypes([
                PriceModel::TYPE_CROSSOVER,
            ], false);
            $html = $twig->render('v2/widget/models.html.twig', compact('models', 'location'));
            $item->set($html);
                $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_suv(Environment $twig, PriceBrand $brand, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = 'models_suv' . $brand->getName() ;
        if ($location) {
            $itemName .= $location->getPath();
        }
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $models = $brand->filterPriceModelsByTypes([
                PriceModel::TYPE_SUV,
            ], false);
            $html = $twig->render('v2/widget/models.html.twig', compact('models', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_van(Environment $twig, PriceBrand $brand, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = 'models_van' . $brand->getName() ;
        if ($location) {
            $itemName .= $location->getPath();
        }
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $models = $brand->filterPriceModelsByTypes([
                PriceModel::TYPE_VAN,
            ], false);
            $html = $twig->render('v2/widget/models.html.twig', compact('models', 'location'));
            $item->set($html);
                $this->cache->save($item);
        }
        return $item->get();
    }

    public function models_popular(Environment $twig, PriceBrand $brand, PageInterface $page): string
    {
        $location = $page->getLocation();
        $itemName = 'models_popular' . $brand->getName() ;
        if ($location) {
            $itemName .= $location->getPath();
        }
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $models = $brand->filterPriceModelsByPopular(false);
            $html = $twig->render('v2/widget/models.html.twig', compact('models', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }

    private function getBrandsWithFilteredModels(array $types): array
    {
        $brands = $this->brand_repository->findAllWithModels();

        foreach ($brands as $brand) {
            $brand->filterPriceModelsByTypes($types);
        }

        return array_filter($brands, static function (PriceBrand $brand) {
            return count($brand->getPriceModels()) > 0;
        });
    }
}
