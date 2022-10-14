<?php

namespace Module\Main\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index()
    {
        return $this->json(
            [
                'status' => 'access denied'
            ]
        );
    }
}
