<?php

namespace App\Controller;

use App\Entity\Phone;
use App\Pagination\PaginatedCollection;
use App\Repository\PhoneRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pagerfanta\Pagerfanta;


class PhoneController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/phones", name="api_phones_list")
     *
     * @Rest\View(serializerGroups={"Default"})
     *
     * @param Request $request
     * @param PhoneRepository $phoneRepository
     * @return PaginatedCollection
     */
    public function showAll(Request $request, PhoneRepository $phoneRepository)
    {
        //Je récupère la page courante
        $page = $request->query->get('page',1);
        //Je définis la variable de limite de produits par page
        $limit = 5;

        //Je récupère tous les produits
        $queryBuilder = $phoneRepository->findAllPhones();

        //Configuration de pagerfanta
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pager = new Pagerfanta($adapter);
        $pager->setMaxPerPage($limit)
              ->setCurrentPage($page)
        ;

        //Je déclare un tableau phones
        $phones = array();
        //J'alimente le tableau avec les produits de la page courante
        foreach($pager->getCurrentPageResults() as $phone){
            $phones[] = $phone;
        }

        //Je retourne la collection paginée
        return  new PaginatedCollection(
            $phones,
            $pager->getNbResults()
        );


    }

    /**
     * Permet d'afficher le détail d'un produit
     *
     * @Rest\Get(
     *     path = "/api/phones/{id}",
     *     name="api_phone_show",
     *     requirements = {"id" = "\d+"}
     * )
     * @Rest\View(serializerGroups={"detail"})
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
