<?php

namespace App\Controller;

use DateTime;
use App\Entity\Personnages;
use App\Form\PersonnageFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_home")
     */
    public function home(EntityManagerInterface $entityManager, Request $request): Response
    {
        $personnages = new Personnages();

        $form = $this->createForm(PersonnageFormType::class, $personnages)
            ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $personnages->setCreatedAt(new DateTime());

                $entityManager->persist($personnages);
                $entityManager->flush();

                $this->addFlash('success', "Le personnage a bien été enregistré !");
                return $this->redirectToRoute('default_home');

        } # end if ($form)

        $personnages = $entityManager->getRepository(Personnages::class)->findAll();

        return $this->render('default/home.html.twig', [
            'controller_name' => 'DefaultController',
            'personnages' => $personnages,
            'form' => $form->createView()
        ]);
    } 


}
