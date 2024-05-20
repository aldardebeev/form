<?php

namespace App\Controller;

use App\Type\PersonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    #[Route('/person', name: 'person')]
    public function form(Request $request): Response
    {
        $form = $this->createForm(PersonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // Здесь будет обработка данных
            return $this->redirectToRoute('person');
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
