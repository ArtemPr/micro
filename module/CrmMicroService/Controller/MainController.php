<?php

namespace Module\CrmMicroService\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/crm')]
    public function index(): Response
    {
        return $this->json(
            [
                'service' => 'crm',
            ]
        );
    }
}
