<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     * Permet d'afficher le détail d'un utilisateur
     *
     * @Route("/api/users/{id}", name="user_show", methods={"GET"})
     *
     * @param SerializerInterface $serializer
     * @param User $user
     * @return Response
     */
    public function show(SerializerInterface $serializer, User $user){

        //Je serialize
        $data = $serializer->serialize($user, 'json', [
            'groups'=> "user"
        ]);
        //Je crée une Response avec le Json $data
        $response = new Response($data);
        //J'indique à l'utilisateur qu'il s'agit d'une appli json
        $response->headers->set('Content-Type', 'application/json');
        //Je retourne la réponse
        return $response;

    }

    /**
     * Permet de créer un utilisateur
     *
     * @Route("/api/users", name="api_user_create", methods={"POST"})
     * @param ValidatorInterface $validator
     * @param CustomerRepository $repo
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function create(ValidatorInterface $validator, CustomerRepository $repo, Request $request, EntityManagerInterface $manager, SerializerInterface $serializer)
    {

        //Je récupère les informations envoyées
        $data = $request->getContent();
        //Je stocke les données dans un tableau
        $dataTab = $serializer->decode($data, 'json');
        //Je crée un nouvel objet User
        $user = new User();
        //Je récupère le Customer par l'id passé dans la requete
        $customer = $repo->find($dataTab['customer']['id']);
        //Je déserialise et je stocke dans un user
        $serializer->deserialize($data, User::class, 'json',['object_to_populate'=>$user]);
        //J'attribue le customer lié à mon user
        $user->setCustomer($customer);

        //Je gère la validation
        $errors = $validator->validate($user);
        //Si $errors existe
        if(count($errors)){
            //Je serialize
            $errors = $serializer->serialize($errors, 'json');
            //Je retourne le résultat
            return new Response($errors, Response::HTTP_BAD_REQUEST);
        }

        //Je persist
        $manager->persist($user);
        //J'enregistre en bdd
        $manager->flush();

        //Je retourne un réponse
        return new Response('User create', Response::HTTP_CREATED);
    }

    /**
     * Permet de supprimer un utilisateur
     *
     * @Route("/api/users/{id}", name="api_users_delete", methods={"DELETE"})
     * @param User $user
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(User $user, EntityManagerInterface $manager)
    {
        $manager->remove($user);
        //J'enregistre en bdd
        $manager->flush();
        //Je retourne la réponse
        return new Response("User supprimé !", Response::HTTP_OK, []);
    }


}
