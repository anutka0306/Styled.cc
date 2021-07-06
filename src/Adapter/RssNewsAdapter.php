<?php

namespace App\Adapter;

use App\Entity\News;
use PhpProgrammist\YandexTurboRssGeneratorBundle\Adapters\BasePageInterface;
use PhpProgrammist\YandexTurboRssGeneratorBundle\Adapters\RssBaseAdapter;
use PhpProgrammist\YandexTurboRssGeneratorBundle\RssItem;

class RssNewsAdapter extends RssBaseAdapter
{
    protected function adapt(array $original_items, BasePageInterface $base_page)
    {
        /** @var News $original_item */
        foreach ($original_items as $original_item) {
            $link = $base_page->getPath() . $original_item->getId() . '/';
            $item = new RssItem(
                $original_item->getId(),
                $link,
                $original_item->getName(),
                $original_item->getDate(),
                $original_item->getText()
            );
            $item->setAllBreadcrumbs('Главная',$base_page);
            $this->addItem($item);
        }
    }
}