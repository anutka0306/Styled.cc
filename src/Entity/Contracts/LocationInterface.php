<?php


namespace App\Entity\Contracts;


interface LocationInterface
{
    public function getName(): ?string;

    public function getCode(): ?string;

    public function getPath(): ?string;

    public function getSeoName(): ?string;
}