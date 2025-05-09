<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;

final class CarController extends AbstractController
{
    #[Route('/car/{id}', name: 'car_details', requirements: ['id' => '\d+'])]
    public function details(int $id, CarRepository $carRepository): Response
    {
        $data['car'] = $carRepository->find($id);
        $data['car'] ?? throw $this->createNotFoundException("Car not found.");

        return $this->render('car/details.html.twig', $data);
    }

    #[Route('car/{id}/delete', name: 'car_delete', requirements: ['id' => '\d+'])]
    public function delete(int $id, CarRepository $carRepository, EntityManagerInterface $entityManager): Response
    {
        $car = $carRepository->find($id);
        $car ?? throw $this->createNotFoundException("Car not found.");

        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}
