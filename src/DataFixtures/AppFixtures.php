<?php
namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Plan;
use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users=$customers=[];

        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        $user = new User();
        $user->setEmail("superadmin@yopmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'password'
        ));
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setFirstname($faker->firstName);
        $user->setLastname($faker->lastName);
        $manager->persist($user);

        // on créé 10 users
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail(sprintf('saler_%d@yopmail.com', $i));
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'password'
            ));
            $user->setRoles(["ROLE_USER"]);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setAdress($faker->address);
            $user->setPostalCode($faker->postcode);
            $user->setCity($faker->city);
            $user->setCountry($faker->country);
            $user->setPhone($faker->phoneNumber);
            $manager->persist($user);
            $users[] = $user;
        }


        // on créé 10 users
        for ($i = 0; $i < 20; $i++) {
            $user = new Customer();
            $user->setEmail(sprintf('customer_%d@yopmail.com.com', $i));
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setAdress($faker->address);
            $user->setPostalCode($faker->postcode);
            $user->setCountry($faker->country);
            $user->setCity($faker->city);
            $user->setPhone($faker->phoneNumber);
            $manager->persist($user);

            $project = new Project();
            $project->setCustomer($user);
            $project->setUser($users[array_rand($users)]);
            $project->setName(sprintf("Maison_%d", $i));
            $project->setCreationDate($faker->dateTimeBetween('-90 days', "now"));
            $project->setDateEnd($faker->dateTimeBetween("now", "+2 years"));
            $manager->persist($project);

            $plan = new Plan();
            $plan->setName("Plan_".$i);
            $plan->setProject($project);
            $project->setPlan($plan);
            $manager->persist($plan);

        }
        $manager->flush();
    }
}

