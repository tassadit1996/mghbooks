<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Classe\Mail;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderSuccessController extends AbstractController

{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager )
    {
        $this->entityManager=$entityManager;
    }

    #[Route('/commande/merci/{stripeSessionId}', name: 'order_validate')]
    public function index(Cart $cart, $stripeSessionId): Response
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneByStripeSessionId($stripeSessionId);
        
        
        if ($order->getState() == 0) {
            $cart->remove();
           $order->setState(1);
           $this->entityManager->flush();
           $email = new Mail();
               $content = "Votre commande est bien validée";
               $email->send($order->getUser()->getEmail(),$order->getUser()->getFirstname(),"Commande de MGH BOOKS",$content);
        }
      
        return $this->render('order_success/index.html.twig',
        [
            'order' => $order
        ]);
    }
    
}
