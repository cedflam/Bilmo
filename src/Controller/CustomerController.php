<?php

namespace App\Controller;

use App\Entity\Customer;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;


class CustomerController extends AbstractController
{
    /**
     * Permet de voir la liste des utilisateurs inscrits liés à un client
     *
     *@Rest\Get(
     *     path = "/api/customer/{id}",
     *     name="api_customer_show",
     *     requirements = {"id" = "\d+"}
     * )
     * @Rest\View()
     *
     * @param SerializerInterface $serializer
     * @param Customer $customer
     * @return Response
     */
    public function show(SerializerInterface $serializer, Customer $customer)
    {
        //Je serialize
        $data = $serializer->serialize($customer, 'json');
        //Je crée une Response avec le Json $data
        $response = new Response($data);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');
        //Je retourne la réponse
        return $response;
    }
}
