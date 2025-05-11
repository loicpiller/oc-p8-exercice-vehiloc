<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class CarController extends AbstractController
{

    private CarRepository $carRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(CarRepository $carRepo, EntityManagerInterface $entityManager)
    {
        $this->carRepository = $carRepo;
        $this->entityManager = $entityManager;
    }

    #[Route('/car/{id}', name: 'car_details', requirements: ['id' => '\d+'])]
    public function details(int $id): Response
    {
        $data['car'] = $this->carRepository->find($id);
        $data['car'] ?? throw $this->createNotFoundException("Car not found.");

        return $this->render('car/details.html.twig', $data);
    }

    #[Route('car/{id}/delete', name: 'car_delete', requirements: ['id' => '\d+'])]
    public function delete(int $id): Response
    {
        $car = $this->carRepository->find($id);
        $car ?? throw $this->createNotFoundException("Car not found.");

        $this->entityManager->remove($car);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_home');
    }

    #[Route('/car/create', name: 'car_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $car = $form->getData();

            $this->entityManager->persist($car);
            $this->entityManager->flush();

            return $this->redirectToRoute('car_details', ['id' => $car->getId()]);
        }

        return $this->render('car/create.html.twig', [
            'form' => $form,
        ]);
    }
}
