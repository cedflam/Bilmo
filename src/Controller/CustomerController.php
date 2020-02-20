<?php

namespace App\Controller;

use App\Entity\Customer;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Response;



class CustomerController extends AbstractFOSRestController
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
     * @SWG\Response(
     *     response=200,
     *     description="Affiche la liste des utilisateurs liés à un client",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Customer::class, groups={"customer"}))
     *     )
     * )
     *  @SWG\Response(
     *     response=500,
     *     description="Affiche un message d'erreur lorsque le client n'existe pas"
     *     )
     * )
     *
     * @SWG\Tag(name="Client")
     *
     * @param SerializerInterface $serializer
     * @param Customer $customer
     * @return Response
     */
    public function show(SerializerInterface $serializer, Customer $customer)
    {

        //Je serialize
        $data = $serializer->serialize($customer, 'json',
            SerializationContext::create()->setGroups(array('customer')));
        //Je crée une Response avec le Json $data
        $response = new Response($data);
        // Je mets en cache la response pour 3600s
        $response->setSharedMaxAge(3600);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');
        //Je retourne la réponse
        return $response;
    }
}
