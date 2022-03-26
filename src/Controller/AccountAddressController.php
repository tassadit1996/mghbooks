<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Adress;
use App\Form\AddressType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountAddressController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
    #[Route('/compte/adresses', name: 'account_address')]
    public function index(): Response
    {
        return $this->render('account/address.html.twig');
    }

    #[Route('/compte/ajouter-une-adresse', name: 'account_address_add')]
    public function add(Cart $cart ,Request $request): Response
    {
        $adress = new Adress();
        $form = $this->createForm(AddressType::class, $adress);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $adress->setUser($this->getUser());
            $this->entityManager->persist($adress);
            $this->entityManager->flush();
            if ($cart->get()) {
                return $this->redirectToRoute('order');
            }else {
                 return $this->redirectToRoute('account_address');
            }


           
        }
        return $this->render('account/address_form.html.twig',[
            'form' => $form->createView(),
        ]);
    }

  

    #[Route('/compte/modifier-une-adresse/{id}', name: 'account_address_edit')]
    public function edit(Request $request, $id): Response
    {
        $adress = $this->entityManager->getRepository(Adress::class)->findOneById($id);
        if (!$adress || $adress->getUser() != $this->getUser() ) {
            return $this->redirectToRoute('account-address');
        }


        $form = $this->createForm(AddressType::class, $adress);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $adress->setUser($this->getUser());
            $this->entityManager->persist($adress);
            $this->entityManager->flush();


            return $this->redirectToRoute('account_address');
        }
        return $this->render('account/address_form.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    #[Route('/compte/supprimer-une-adresse/{id}', name: 'account_address_delete')]
    public function delete($id): Response
    {
        $adress = $this->entityManager->getRepository(Adress::class)->findOneById($id);


        if ($adress && $adress->getUser() == $this->getUser() ) {
            $this->entityManager->remove($adress);
            $this->entityManager->flush();
        }
            return $this->redirectToRoute('account_address');
        
        
    }
}
