<?php

namespace Module\CrmMicroService\Entity;


use Module\CrmMicroService\Repository\OrderNumRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderNumRepository::class)]
class OrderNum
{

}
