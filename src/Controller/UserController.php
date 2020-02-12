<?php

namespace App\Controller;

use App\Entity\User;
use App\Exception\ResourceValidationException;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     * Permet d'afficher le détail d'un utilisateur
     *
     * @Route("/api/users/{id}", name="api_user_show", methods={"GET"})
     *
     * @param SerializerInterface $serializer
     * @param User $user
     * @return Response
     */
    public function show(SerializerInterface $serializer, User $user)
    {

        //Je serialize
        $data = $serializer->serialize($user, 'json', [
            'groups' => "user"
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
     * @Rest\Post(
     *     path="api/users",
     *     name="api_users_create"
     * )
     * @Rest\View(StatusCode = 201)
     *
     * @ParamConverter("user", converter="fos_rest.request_body")
     *
     * @param ConstraintViolationList $violations
     * @param EntityManagerInterface $manager
     * @param User $user
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param CustomerRepository $repo
     * @return User
     * @throws ResourceValidationException
     */
    public function create(

        ConstraintViolationList $violations,
        EntityManagerInterface $manager,
        User $user,
        Request $request,
        SerializerInterface $serializer,
        CustomerRepository $repo
    )

    {
        //Je gère les erreurs
        if(count($violations)){
            $message = "Le Json envoyé contient des données invalides";
            foreach($violations as $violation){
                $message .= sprintf(
                    " Fiels %s: %s",
                    $violation->getPropertyPath(),
                    $violation->getMessage()
                );
            }
            throw new ResourceValidationException($message);
        }

        //Je récupère les informations envoyées
        $data = $request->getContent();
        //Je stocke les données dans un tableau
        $dataTab = $serializer->decode($data, 'json');

        //Je récupère le Customer par l'id passé dans la requete
        $customer = $repo->find($dataTab['customer']['id']);

        //J'attribue le customer lié à mon user
        $user->setCustomer($customer);

        //Je persist
        $manager->persist($user);
        //J'enregistre en bdd
        $manager->flush();

        //Je retourne un réponse
        return $this->view(
            $user,
            Response::HTTP_CREATED,
            [
                'location' => $this->generateUrl('api_users_create', ['id' => $user->getId()], UrlGeneratorInterface::ABSOLUTE_URL)
            ]

        );
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
