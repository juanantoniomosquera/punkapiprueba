<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Punk\Punk;
use App\Service\Util\Util;

class PunkApiController extends AbstractController
{
    /**
     * @Route("/punk/api/searchfood/{food}", name="punk_api_searchfood")
     */
    public function searchFood(Punk $punkService, Util $util, string $food): Response
    {
        return $this->json([
            'message' => 'Food for beers',
            'result' => $punkService->getBeersByFood($food, ['id', 'name', 'description'], $util)
        ]);
    }
}
