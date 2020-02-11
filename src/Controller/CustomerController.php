<?php

namespace App\Controller;

use App\Entity\Customer;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
    /**
     * Permet de voir la liste des utilisateurs inscrits liés à un client
     *
     * @Route("/api/customer/{id}", name="api_customer_show_users", methods={"GET"})
     * @param SerializerInterface $serializer
     * @param Customer $customer
     * @return Response
     */
    public function show(SerializerInterface $serializer, Customer $customer)
    {
        //Je serialize
        $data = $serializer->serialize($customer, 'json',[
            'groups'=>['customer']
        ]);
        //Je crée une Response avec le Json $data
        $response = new Response($data);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');
        //Je retourne la réponse
        return $response;
    }
}
