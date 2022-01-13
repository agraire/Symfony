<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Création d'un génrateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        $nbStages = 15;
        for($i=0; $i <= $nbStages; $i++)
        {

        $formation = new Formation();
        $formation -> setNomLong($faker->sentence($nbWords = 3, $variableNbWords = true));
        $formation -> setNomCourt($faker->word);


        $manager->persist($formation);
        }

        //Envoyer les données en BD
        $manager->flush();
    }
}
