<?php

namespace App\Entity\Traits;

trait GeneratedMetaTagsTrait
{
    //abstract public function getBrandModelWithTranslation(): string;

    //abstract public function getServiceName(): string;

    public function getBrandModelWithTranslation():string
    {
        return '';
    }

    public function getServiceName(): ?string
    {
        if ( ! $this->getService()) {
            if ($this->getPriceBrand() || $this->getPriceModel()) {
                return 'Кузовные работы';
            }
            return $this->getName();
        }
        return $this->getService()->getName();
    }

    public function getLocationSeoName(): ?string
    {
        if ( ! $this->getLocation()) {
            return '';
        }
        return $this->getLocation()->getSeoName();
    }
    
    public function getServiceBrandModelName(): string
    {
        return $this->getServiceName() . ' ' . $this->getBrandModelWithTranslation();
    }
    
    public function getH1Generated(): string
    {
        if (! $this->getLocation()) {
           return $this->getServiceBrandModelName() . ' в Москве';
        }
        return $this->getServiceBrandModelName() . ' в Москве ' . $this->getLocation()->getSeoName();
    }
    
    public function getMetaTitleGenerated(): string
    {
        return $this->getH1Generated() . ' - кузовной центр Детейлингофъ';
    }
    
    public function getMetaDescriptionGenerated(): string
    {
        $template = 'SERVICE BRAND MODEL в Москве LOCATION. &#11088; Вернем вид нового автомобиля! &#9989; Скидки до 20% на работы. &#9989; Комфортная зона ожидания! &#11088; SERVICE BRAND MODEL &#9200; Узнать цены или записаться в кузовной центр BRAND «Детейлингофъ» &#9742; 8(800)100-87-53.';
        $service = $this->getServiceName();
        $brand_model = $this->getBrandModelWithTranslation();
        $brand = $this->getBrandName();
        $location = $this->getLocationSeoName();
        return str_replace(['SERVICE', 'BRAND MODEL', 'BRAND', 'LOCATION'], [$service, $brand_model, $brand, $location], $template);
    }
}