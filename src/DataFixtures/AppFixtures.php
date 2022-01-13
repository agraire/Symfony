<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formation = new Formation();
        $formation -> setNomLong("Consulting dans la cybersécurité");
        $formation -> setNomCourt("CONSULTING");


        $manager->persist($formation);

        $manager->flush();
    }
}
