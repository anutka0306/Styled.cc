<?php

namespace App\Twig;

use App\Entity\Content;
use App\Entity\Contracts\PageInterface;
use App\Service\FileManager;
use App\Service\NaschirabotyManager;
use App\Service\OurWorksService;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class SliderExtension extends AbstractExtension
{
    /**
     * @var OurWorksService
     */
    protected $our_works_service;
    /**
     * @var NaschirabotyManager
     */
    private $naschirabotyManager;
    /**
     * @var FileManager
     */
    private $fileManager;
    /**
     * @var AdapterInterface
     */
    protected $cache;

    /**
     * @param OurWorksService $our_works_service
     * @param NaschirabotyManager $naschirabotyManager
     * @param FileManager $fileManager
     */
    public function __construct(
        OurWorksService $our_works_service,
        NaschirabotyManager $naschirabotyManager,
        FileManager $fileManager,
        AdapterInterface $cache
    )
    {

        $this->our_works_service = $our_works_service;
        $this->naschirabotyManager = $naschirabotyManager;
        $this->fileManager = $fileManager;
        $this->cache = $cache;
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('swiper_slider', [$this, 'swiper_slider'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('our_works_slider', [$this, 'our_works_slider'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('naschiraboty_slider', [$this, 'naschiraboty_slider'],['needs_environment' => true, 'is_safe' => ['html']]),
            new TwigFunction('files_from_folder', [$this, 'getFilesFromFolder']),
        ];
    }

    public function swiper_slider(Environment $twig,$folder)
    {
        $files = $this->fileManager->getFilesFromFolder($folder);
        if (empty($files)) {
            return '';
        }
        return $twig->render('v2/extensions/swiper_slider.html.twig', compact('files'));
    }

    public function our_works_slider(Environment $twig, PageInterface $page)
    {
        $folder = $this->our_works_service->getFolder($page);
        $files = $this->fileManager->getFilesFromFolder($folder);
        if (empty($files)) {
            return '';
        }
        return $twig->render('v2/extensions/gallery.html.twig', compact('files'));
    }

    public function naschiraboty_slider(Environment $twig,?Content $page = null)
    {
        $location = $page->getLocation();
        $itemName = $location ? 'naschiraboty_slider' . '-' . $location->getPath() : 'naschiraboty_slider';
        $item = $this->cache->getItem($itemName);
        if (!$item->isHit()) {//если данное значение не закешировано
            $items = $this->naschirabotyManager->getItems($page);
            if (empty($items)) {
                $html = '';
            }
            return $twig->render('v2/extensions/naschiraboty.html.twig', compact('items', 'location'));
            $html = $twig->render('v2/extensions/naschiraboty.html.twig', compact('items', 'location'));
            $item->set($html);
            $this->cache->save($item);
        }
        return $item->get();
    }
    
    public function getFilesFromFolder(string $folder, int $limit = 0): array
    {
        return $this->fileManager->getFilesFromFolder($folder,  $limit);
    }
}
