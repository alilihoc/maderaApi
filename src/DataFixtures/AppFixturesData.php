<?php
namespace App\DataFixtures;

use App\Entity\Coverage;
use App\Entity\Finition;
use App\Entity\Floor;
use App\Entity\Gamme;
use App\Entity\Isolation;
use App\Entity\Structure;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixturesData extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type->setLabel("Murs extérieurs");
        $manager->persist($type);

        $type = new Type();
        $type->setLabel("Cloisons intérieures");
        $manager->persist($type);

        $type = new Type();
        $type->setLabel("Plancher sur dalle");
        $manager->persist($type);

        $type = new Type();
        $type->setLabel("Ferme de charpente");
        $manager->persist($type);

        $type = new Type();
        $type->setLabel("Couverture");
        $manager->persist($type);

        $type = new Type();
        $type->setLabel("Plancher porteur");
        $manager->persist($type);

        for ($i = 0; $i < 10; $i++) {
            $floor = new Floor();
            $floor->setLabel("floor_".$i);
            $floor->setPrice(mt_rand(15,40));
            $manager->persist($floor);

            $structure = new Structure();
            $structure->setLabel("structure_".$i);
            $structure->setPrice(mt_rand(15,40));
            $manager->persist($structure);

            $finition = new Finition();
            $finition->setLabel("finition_".$i)->setPrice(mt_rand(15,40));
            $manager->persist($finition);

            $coverage = new Coverage();
            $coverage->setLabel("coverage_".$i)->setPrice(mt_rand(15,40));
            $manager->persist($coverage);

            $isolation = new Isolation();
            $isolation->setLabel("isolation_".$i)->setPrice(mt_rand(15,40));
            $manager->persist($isolation);

            $gamme = new Gamme();
            $gamme ->setLabel("Gamme_".$i);
            $gamme->setCoefficient(mt_rand(1,3));
            $manager->persist($gamme);
        }
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}

