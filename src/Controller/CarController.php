<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;

final class CarController extends AbstractController
{
    #[Route('/car/{id}', name: 'car_details', requirements: ['id' => '\d+'])]
    public function index(int $id, CarRepository $carRepository): Response
    {
        $data['car'] = $carRepository->find($id);
        $data['car'] ?? throw $this->createNotFoundException("Car not find.");

        return $this->render('car/details.html.twig', $data);
    }
}
