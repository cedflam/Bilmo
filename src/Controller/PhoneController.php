<?php

namespace App\Controller;

use App\Entity\Phone;
use App\Pagination\PaginatedCollection;
use App\Repository\PhoneRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pagerfanta\Pagerfanta;


class PhoneController extends AbstractFOSRestController
{
    /**
     * Permet d'afficher la liste des produits
     *
     * @Rest\Get("/api/phones", name="api_phones_list")
     *
     * @Rest\View(serializerGroups={"Default"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Affiche la liste des produits",
     *     @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref=@Model(type=Phone::class, groups={"Default"}))
     *     )
     * )
     *
     * @SWG\Tag(name="Produits")
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

        //Je crée une response que je mets en cache
        $response = new Response($phones);
        $response->setSharedMaxAge(3600);


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
     * @SWG\Response(
     *     response=200,
     *     description="Affiche le détail d'un produit",
     *     @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref=@Model(type=Phone::class, groups={"detail"}))
     *     )
     * )
     * @SWG\Response(
     *     response=500,
     *     description="Affiche une erreur lorsque le produit n'existe pas"
     * )
     *
     * @SWG\Tag(name="Produits")
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
        //Je mets la response en cache
        $response->setSharedMaxAge(3600);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');

        //Je retourne la réponse
        return $response;

    }

}
