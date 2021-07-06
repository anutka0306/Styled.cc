<?php

namespace App\Entity\Traits;

use App\Entity\Contracts\LocationInterface;
use App\Entity\Contracts\PageInterface;
use Doctrine\ORM\Mapping as ORM;

trait SeoTrait
{
    use LocationTrait;
    use GeneratedMetaTagsTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    protected $name;
    /**
     * @var string
     *
     * @ORM\Column(name="h1", type="string", length=250, nullable=true)
     */
    protected $h1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="string", length=250, nullable=true)
     */
    protected $metaTitle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", length=65535, nullable=true)
     */
    protected $metaDescription;

    public function getH1WithLocation(): ?string
    {
        if ($this->h1) {
            if ($this->location) {
                //сделать заголовок для страницы с локацией
                return $this->getH1Generated();
            }
            return $this->h1;
        }
        if ($this->name) {
            if ($this->location) {
                //сделать заголовок для страницы с локацией
                return $this->getH1Generated();
            }
            return $this->name.' в Москве';
        }
        return null;
    }
    
    public function getH1(): ?string
    {
        if ($this->h1) {
            return $this->h1;
        }
        if ($this->name) {
            return $this->name.' в Москве';
        }
        return null;
    }
    
    public function setH1(?string $h1):self
    {
        $this->h1 = $h1;
        
        return $this;
    }
    
    public function getMetaTitle(): ?string
    {
        if ($this->location) {
            //сделать тайтл для страницы с локацией
            return $this->getMetaTitleGenerated();
        }
        return $this->metaTitle;
    }
    
    public function setMetaTitle(?string $metaTitle):self
    {
        $this->metaTitle = $metaTitle;
        
        return $this;
    }
    
    public function getMetaDescription(): ?string
    {
        if ($this->location) {
            //сделать описание для страницы с локацией
            return $this->getMetaDescriptionGenerated();
        }
        return $this->metaDescription;
    }
    
    public function setMetaDescription(?string $metaDescription):self
    {
        $this->metaDescription = $metaDescription;
        
        return $this;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }

    abstract public function getPath():string;

    public function getBrandName(): string
    {
        return '';
    }

    /**
     * @return string|PageInterface
     */
    abstract public function getParent();

    public function getBrandAndModelName():string
    {
        return '';
    }
    
    public function __toString()
    {
        return (string)$this->getH1();
    }
}