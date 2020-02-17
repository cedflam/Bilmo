<?php

namespace App\Controller;

use App\Entity\Phone;
use App\Pagination\PaginatedCollection;
use App\Repository\PhoneRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Response;


class PhoneController extends AbstractFOSRestController
{
    /**
     * Permet d'afficher la liste des produits
     *
     * @Rest\Get("/api/phones", name="api_phones_list")
     *
     * @Rest\View()
     *
     * @SWG\Response(
     *     response=200,
     *     description="Affiche la liste des produits",
     *     @SWG\Schema(
     *          type="array",
     *          @SWG\Items(ref=@Model(type=Phone::class, groups={"list"}))
     *     )
     * )
     *
     * @SWG\Tag(name="Produits")
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param PhoneRepository $repo
     * @return Response
     */
    public function showAll(Request $request, SerializerInterface $serializer, PhoneRepository $repo)
    {
        //Je récupère la page courante
        $page = $request->query->get('page', 1);
        //Je définis la variable de limite de produits par page
        $limit = 5;

        //Je récupère tous les produits
        $queryBuilder = $repo->findAllPhones();

        //Configuration de pagerfanta
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pager = new Pagerfanta($adapter);
        $pager->setMaxPerPage($limit)
            ->setCurrentPage($page);

        //Je déclare un tableau phones
        $phones = array();
        //J'alimente le tableau avec les produits de la page courante
        foreach ($pager->getCurrentPageResults() as $phone) {
            $phones[] = $phone;
        }

        //Je serialize
        $data = $serializer->serialize($phones, 'json',
                SerializationContext::create()->setGroups(array('list'))
            );
        //Je crée une response avec les données serializées
        $response = new Response($data);
        //Je configure le cache pour 3600s
        $response->setSharedMaxAge(3600);
        //Je retourne la réponse
        return $response;


    }

    /**
     * Permet d'afficher le détail d'un produit
     *
     * @Rest\Get(
     *     path = "/api/phones/{id}",
     *     name="api_phone_show",
     *     requirements = {"id" = "\d+"}
     * )
     * @Rest\View()
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
        $data = $serialize->serialize($phone, 'json',
            SerializationContext::create()->setGroups(array('detail')));
        //Je crée une Response avec le Json $data
        $response = new Response($data);
        //Je mets la response en cache pour 3600s
        $response->setSharedMaxAge(3600);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');

        //Je retourne la réponse
        return $response;

    }

}
