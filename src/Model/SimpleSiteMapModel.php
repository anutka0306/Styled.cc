<?php

namespace App\Model;

use App\Dto\PageDto;

class SimpleSiteMapModel
{
    /**
     * @var string|null
     */
    protected $partFileName;
    /**
     * @var PageDto[]
     */
    private $pages = [];
    
    public function __construct(
        string $partFileName = null
    ) {
        $this->partFileName = $partFileName;
    }

    public function getPartFileName()
    {
        return $this->partFileName;
    }

    public function addPage($path, $modifyDate)
    {
        $this->pages[] = new PageDto($path, $modifyDate);
    }

    public function getPages()
    {
        return $this->pages;
    }
}