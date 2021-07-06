<?php

namespace App\Entity;

use App\Repository\RootServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PriceService
 *
 * @ORM\Table(name="price__services")
 * @ORM\Entity(repositoryClass="App\Repository\PriceServiceRepository")
 * @ORM\EntityListeners({"App\Doctrine\GeneratePagesByPriceServiceListener"})
 */
class PriceService
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="hours", type="float", precision=4, scale=1, nullable=false, options={"default"="1.0"})
     */
    private $hours = '1.0';

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Service", mappedBy="service")
     */
    private $contents;

    /**
     * @ORM\ManyToOne(targetEntity="PriceCategory", inversedBy="priceServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $priceCategory;
    

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\BeforeAfter", mappedBy="priceServices")
     */
    private $beforeAfterImages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published = 1;
    
    private $priceOfHour = PriceBrand::DEFAULT_PRICE_OF_HOUR;
    private $increase = PriceBrand::DEFAULT_INCREASE;
    private $path;
    private $nameInPriceList;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Salon", mappedBy="excludedServices")
     */
    private $excludedSalons;
    
    public function __construct()
    {
        $this->contents = new ArrayCollection();
        $this->beforeAfterImages = new ArrayCollection();
        $this->excludedSalons = new ArrayCollection();
    }
    
    public function getPriceOfHour(): int
    {
        return $this->priceOfHour;
    }
    
    public function getIncrease(): int
    {
        return $this->increase;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHours(): ?float
    {
        return $this->hours;
    }

    public function setHours(float $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Service $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setService($this);
        }

        return $this;
    }

    public function removeContent(Service $content): self
    {
        if ($this->contents->contains($content)) {
            $this->contents->removeElement($content);
            // set the owning side to null (unless already changed)
            if ($content->getService() === $this) {
                $content->setService(null);
            }
        }

        return $this;
    }

    public function getPriceCategory(): ?PriceCategory
    {
        return $this->priceCategory;
    }

    public function setPriceCategory(?PriceCategory $priceCategory): self
    {
        $this->priceCategory = $priceCategory;

        return $this;
    }
    
    public function setPriceByContent(Content $content)
    {
        $price_brand = $content->getPriceBrand();
        $price_model = $content->getPriceModel();
        $this->increase = $price_brand ? $price_brand->getIncrease() : PriceBrand::DEFAULT_INCREASE;
        $priceOfHour = $price_brand ? $price_brand->getClass()->getPriceOfHour() : PriceBrand::DEFAULT_PRICE_OF_HOUR;
        if ($price_model) {
            $priceOfHour =  $price_model->getClass()->getPriceOfHour();
        }
        $this->priceOfHour = $priceOfHour;
    }
    
    public function setPathByContent(Content $content,RootServiceRepository $rootServiceRepository):self
    {
        $model = $content->getModel();
        if ($model) {
            foreach ($model->getPages() as $page) {
                if ($page instanceof Service && $page->getService() && $page->getService()->getId() === $this->getId() && $page->getPublished()) {
                    $this->path = $page->getPath();
                    $this->nameInPriceList = $this->name.' '.$model->getBrandAndModelName();
                    return $this;
                }
            }
        }
        $brand = $content->getBrand();
        if ($brand) {
            foreach ($brand->getPages() as $page) {
                if ($page instanceof Service && $page->getService() && $page->getService()->getId() === $this->getId()) {
                    if ($page->getPublished()) {
                        $this->path = $page->getPath();
                        $this->nameInPriceList = $this->name.' '.$brand->getBrandAndModelName();
                    }else{
                        $rootServicePage = $rootServiceRepository->findOneBy(['service'=>$this]);
                        if (null !== $rootServicePage) {
                            $this->path = $rootServicePage->getPath();
                            $this->nameInPriceList = $this->name;
                        }
                    }
                    return $this;

                }
            }
        }
        return $this;
    }

    public function setPathForRootService(RootServiceRepository $rootServiceRepository): void
    {
        $rootServicePage = $rootServiceRepository->findOneBy(['service'=>$this]);
        if (null === $rootServicePage) {
            return;
        }
        $this->path = $rootServicePage->getPath();
    }
    
    public function getPrice()
    {
        return round($this->getPriceOfHour() * $this->getHours(), -1) + $this->getIncrease();
    }
    
    
    public function getPath()
    {
        return $this->path;
    }
    
    
    public function __toString()
    {
        return (string)$this->name;
    }

    /**
     * @return Collection|BeforeAfter[]
     */
    public function getBeforeAfterImages(): Collection
    {
        return $this->beforeAfterImages;
    }

    public function addBeforeAfterImage(BeforeAfter $beforeAfterImage): self
    {
        if (!$this->beforeAfterImages->contains($beforeAfterImage)) {
            $this->beforeAfterImages[] = $beforeAfterImage;
            $beforeAfterImage->addPriceService($this);
        }

        return $this;
    }

    public function removeBeforeAfterImage(BeforeAfter $beforeAfterImage): self
    {
        if ($this->beforeAfterImages->contains($beforeAfterImage)) {
            $this->beforeAfterImages->removeElement($beforeAfterImage);
            $beforeAfterImage->removePriceService($this);
        }

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|Salon[]
     */
    public function getExcludedSalons(): Collection
    {
        return $this->excludedSalons;
    }

    public function addExcludedSalon(Salon $excludedSalon): self
    {
        if (!$this->excludedSalons->contains($excludedSalon)) {
            $this->excludedSalons[] = $excludedSalon;
            $excludedSalon->addExcludedService($this);
        }

        return $this;
    }

    public function removeExcludedSalon(Salon $excludedSalon): self
    {
        if ($this->excludedSalons->contains($excludedSalon)) {
            $this->excludedSalons->removeElement($excludedSalon);
            $excludedSalon->removeExcludedService($this);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameInPriceList()
    {
        return $this->nameInPriceList;
    }

}
