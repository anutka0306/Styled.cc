<?php

namespace App\Entity\Traits;

use App\Entity\Contracts\LocationInterface;
use Doctrine\ORM\Mapping as ORM;

trait LocationTrait
{
    protected $location = null;
    
    public function getLocation(): ?LocationInterface
    {
        return $this->location;
    }

    public function setLocation(?LocationInterface $location)
    {
        $this->location = $location;

        return $this;
    }
}