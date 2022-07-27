<?php

namespace Module\SendmailMicroService\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/mailer')]
    public function index(): Response
    {
        return $this->json(
            [
                'service' => 'mailer',
            ]
        );
    }
}
