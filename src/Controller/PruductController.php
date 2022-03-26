<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Pruduct;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PruductController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/nos-produits', name: 'pruducts')]
    public function index( Request $request): Response
    {
        $products = $this->entityManager->getRepository(entityName: Pruduct::class)->findAll();
         $search = new Search();
         $form = $this->createForm(SearchType::class, $search);

         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()){
             $products = $this->entityManager->getRepository(entityName: Pruduct::class)->findWithSearch($search);

         }
        return $this->render('pruduct/index.html.twig',[
            'products'=>$products,
            'form'=>$form->createView()
        ]);
    }

    #[Route('/produit/{slug}', name: 'pruduct')]
    public function show($slug): Response
    {

        $product= $this->entityManager->getRepository(entityName: Pruduct::class)->findOneBySlug($slug);
         if (!$product){
             return $this->redirectToRoute(route: 'pruducts');
         }
        return $this->render('pruduct/show.html.twig',[
            'product'=>$product
        ]);
    }
}
