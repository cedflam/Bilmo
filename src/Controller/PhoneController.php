<?php

namespace App\Controller;

use App\Entity\Phone;
use App\Repository\PhoneRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;



class PhoneController extends AbstractController
{
    /**
     * @Rest\Get("/api/phones", name="api_phones_list")
     * @Rest\View()
     *
     * @param Request $request
     * @param PhoneRepository $phoneRepository
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function showAll(Request $request, PhoneRepository $phoneRepository, SerializerInterface $serializer )
    {
        //Je récupère la page courante
        $page = $request->query->get('page');
        //Je définis la page par défaut
        if(is_null($page) || $page < 1) {
            $page = 1;
        }
        //Je définis le nombre d'éléments par page
        $limit = 5;
        //Je récupère la liste de phones
        $phones = $phoneRepository->findAllPhones($page, $limit);
        //Je serialize au format json
        $data = $serializer->serialize($phones, 'json');
        //Je retourne la response
        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }

    /**
     * Permet d'afficher le détail d'un produit
     *
     * @Rest\Get(
     *     path = "/api/phones/{id}",
     *     name="phone_show",
     *     requirements = {"id" = "\d+"}
     * )
     * @Rest\View()
     *
     * @param Phone $phone
     * @param SerializerInterface $serialize
     * @return Response
     */
    public function show(Phone $phone, SerializerInterface $serialize)
    {
        //Je serialize
        $data = $serialize->serialize($phone, 'json');
        //Je crée une Response avec le Json $data
        $response = new Response($data);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');

        //Je retourne la réponse
        return $response;

    }

}
