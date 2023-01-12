<?php

namespace App\Controller;

use App\Service\Filter\JsonFilter;
use App\Service\Reader\JsonReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarouselController extends AbstractController
{
    #[Route('/carousel', name: 'app_carousel',options: [],methods: ['GET'])]
    public function index(Request $request ,JsonReader $reader,JsonFilter $filter, string $projectDir): JsonResponse
    {

        $carouselContent = $reader->read($projectDir.DIRECTORY_SEPARATOR.'data/converted.json');
        $filteredContent = $filter->filter($carouselContent,[
            'name'=> $request->get('name'),
            'discount_percentage' => $request->get('discount_percentage')
        ]);
       return $this->json($filteredContent);

    }
}
