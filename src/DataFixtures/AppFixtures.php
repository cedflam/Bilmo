<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Phone;
use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    //Propriétés
    private $encoder;
    //Constructeur pour le password encoder
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        //Initialisaton de faker
        $faker = Faker\Factory::create('fr_FR');
        //Genres homme/ Femme
        $genres = ['male', 'female'];
        //Propriétés téléphones
        $model = ['Samsung Galaxy note 10 Plus', 'Huawei P30 Pro', 'Google OnePlus 7T', 'Apple Iphone 11'];
        $color = ['blue', 'red', 'black', 'white'];
        $camera = ['25 Mpx', '35 Mpx', '45 Mpx', '50 Mpx'];
        $screen = ['6 pouces', '6.25 pouces', '6.85 pouces', '7 pouces'];
        $processor = ['A9', 'Exynos 1000', 'Kirin 990', 'Qualcomm SnapDragon'  ];
        $memory = ['4Go', '6Go', '2Go'];
        $battery = ['3000 mAh', '3500 mAh', '4000 mAh'];

        //Je gère le téléphones
        for($i = 0; $i < 20; $i++){

            //Je crée un nouvel objet Phone
            $phone = new Phone();
            //Attribution des specs
            $phone      ->setModel($model[mt_rand(0,3)])
                ->setColor($color[mt_rand(0, 3)])
                ->setCamera($camera[mt_rand(0,3)])
                ->setScreen($screen[mt_rand(0,3)])
                ->setProcessor($processor[mt_rand(0,3)])
                ->setMemory($memory[mt_rand(0,2)])
                ->setBattery($battery[mt_rand(0,2)])
            ;

            $manager->persist($phone);
        }

        //Je gère les customers
        for($j = 0; $j < 10; $j++ ){

            //Je crée un nouvel objet Customer
            $customer = new Customer();
            //Je paramètre l'objet
            $customer   ->setName($faker->company())
                ->setEmail($faker->companyEmail())
                ->setSite($faker->url())
                ->setPassword($this->encoder->encodePassword($customer, $customer->getName()))
            ;
            $manager->persist($customer);

            //Je gère les users
            for($k = 0; $k < 5; $k++){
                //Je crée un nouvel objet User
                $user = new User();

                //Je paramètre l'objet
                $user   ->setFirstName($faker->firstName($genres[mt_rand(0,1)]))
                    ->setLastName($faker->lastName())
                    ->setEmail($faker->email())
                    ->setRegisteredAt($faker->dateTime($max = 'now'))
                    ->setCustomer($customer)

                ;
                $manager->persist($user);
            }

        }

        $manager->flush();
    }
}
