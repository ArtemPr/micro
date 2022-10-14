<?php

namespace Module\OrderNumMicroService\Controller;

use DateTime;
use Module\OrderNumMicroService\Entity\OrderNum;
use Module\OrderNumMicroService\Service\OrderNumService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    public function __construct(
        private readonly OrderNumService $orderNumService,
        private readonly ManagerRegistry $managerRegistry
    )
    {
    }

    /**
     * @return Response
     * @example /num?tc=1&token=f0910071f325b10517c257fb4a65037e
     */
    #[Route('/num', name: 'get_num', methods: ['GET'])]
    public function index(): Response
    {
        if ($this->orderNumService->test_mode === true) {
            $date = new DateTime();
            return $this->json(
                [
                    'mode' => 'dev_mode',
                    'num' => '9999999',
                    'training_centre' => '0',
                    'date_create' => $date->format('r')
                ]
            );
        } else {
            return $this->json(
                $this->get_num()
            );
        }
    }

    /**
     * @return array|string[]
     */
    private function get_num(): array
    {
        $request = new Request(
            query: $_GET
        );

        if (
            !is_null($request->get('token'))
            &&
            $request->get('token') === $this->orderNumService->token
            &&
            (int)$request->get('tc') !== 0
            &&
            !empty($this->orderNumService->training_centre[(int)$request->get('tc')])
        ) {
            $date = new DateTime();
            $num = new OrderNum();
            $num->setDate($date);
            $num->setTrainingCentre($this->orderNumService->training_centre[(int)$request->get('tc')]);
            $entityManager = $this->managerRegistry->getManager();
            $entityManager->persist($num);
            $entityManager->flush();

            return [
                'num' => $num->getId(),
                'mode' => 'prod_mode',
                'training_centre' => $this->orderNumService->training_centre[(int)$request->get('tc')],
                'date_create' => $date->format('r')
            ];
        } else {
            return [
                'status' => 'access denied'
            ];
        }
    }

}
