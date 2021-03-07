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

    /**
     * @Route("/punk/api/searchfoodforview/{food}", name="punk_api_searchfoodforview")
     */
    public function searchFoodForView(Punk $punkService, Util $util, string $food): Response
    {
        return $this->json([
            'message' => 'Data for view',
            'result' => $punkService->getBeersByFood($food, ['id', 'name', 'description', 'tagline', 'image_url', 'first_brewed'], $util)
        ]);
    }
}
