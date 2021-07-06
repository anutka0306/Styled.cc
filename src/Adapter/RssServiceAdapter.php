<?php

namespace App\Adapter;

use App\Entity\Service;
use App\Service\FileManager;
use App\Service\OurWorksService;
use Knp\Component\Pager\Pagination\PaginationInterface;
use PhpProgrammist\YandexTurboRssGeneratorBundle\Adapters\BasePageInterface;
use PhpProgrammist\YandexTurboRssGeneratorBundle\Adapters\RssAdapterInterface;
use PhpProgrammist\YandexTurboRssGeneratorBundle\RssItem;
use Twig\Environment;

class RssServiceAdapter  implements RssAdapterInterface
{
    /**
     * @var RssItem[]
     */
    private $items;
    /**
     * @var PaginationInterface
     */
    private $originalItems;
    /**
     * @var BasePageInterface
     */
    private $basePage;
    /**
     * @var OurWorksService
     */
    private $ourWorksService;
    /**
     * @var FileManager
     */
    private $fileManager;
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @param OurWorksService $ourWorksService
     * @param FileManager $fileManager
     * @param Environment $twig
     */
    public function __construct(
        OurWorksService $ourWorksService,
        FileManager $fileManager,
        Environment $twig
    )
    {
        $this->ourWorksService = $ourWorksService;
        $this->fileManager = $fileManager;
        $this->twig = $twig;
    }

    /**
     * @return RssItem[]
     */
    public function getItems(): array
    {
        if (empty($this->items)) {
            $this->adapt();
        }
        return $this->items;
    }

    /**
     * @param PaginationInterface $originalItems
     * @return $this
     */
    public function setOriginalItems(PaginationInterface $originalItems): self
    {
        $this->originalItems = $originalItems;
        return $this;
    }

    /**
     * @param BasePageInterface $basePage
     * @return $this
     */
    public function setBasePage(BasePageInterface $basePage): self
    {
        $this->basePage = $basePage;
        return $this;
    }


    protected function addItem(RssItem $item):void
    {
        $this->items[] = $item;
    }

    protected function adapt():void
    {
        foreach ($this->originalItems as $originalItem) {
            $link = $originalItem->getPath();
            $item = new RssItem(
                $originalItem->getId(),
                $link,
                $originalItem->getH1(),
                $originalItem->getModifyDate()->getTimestamp(),
                $this->getText($originalItem)
            );
            $item->setAllBreadcrumbs('Главная', $this->basePage);
            $this->addItem($item);
        }
    }

    private function getText(Service $service): string
    {
        $ourWorksImages = $this->fileManager->getFilesFromFolder(
            $this->ourWorksService->getFolder($service)
        );

        return $this->twig->render('v2/turbo/service/content.html.twig',[
            'ourWorksImages' => $ourWorksImages,
            'service' => $service,
        ]);
    }
}