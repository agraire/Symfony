<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use APP\Entity\Stage;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Création d'un génrateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        /***************************************
         *** CREATION DES ENTREPRISES ***
         **************************************/
        for ($i = 0; $i<20; $i++)
        {
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company);
            $entreprise->setActivite($faker->realText());
            $entreprise->setURLSite($faker->url);
            $entreprise->setAdresse($faker->address);

            $entreprises[] = $entreprise;
            $manager->persist($entreprise);
        }
        

        /***************************************
         *** CREATION DES FORMATIONS ***
         **************************************/
        $modulesFormation = array(
            "DUT Informatique" => "Diplôme Universitaire Technologique Informatique",
            "Licence Pro Informatique" => "Licence Professionelle Informatique",
            "DUT IC" => "Diplôme Universitaire Technologique d'Information et Communication"
        );

        foreach($modulesFormation as $nomC => $nomL)
        {
            $formation = new Formation();
            $formation->setNomCourt($nomC);
            $formation->setNomLong($nomL);


            /***************************************
         *** CREATION DES STAGES ***
         **************************************/
            for ($numStage = 0; $numStage<10; $numStage++)
            {
                $stage = new Stage();
                $stage->setTitre($faker->realText(140));
                $stage->setEmail($faker->email);
                $stage->setDescription($faker->realText());
                $stage->setDomaine($faker->word);

                //Relation entre Formation et Stage
                $stage->addFormation($formation);

                //Création d'un nombre aléatoire
                $numEntreprise = $faker->numberBetween($min =0,$max=19);

                //Relation entre Entreprise et Stage
                $stage->setEntreprise($entreprises[$numEntreprise]);
                $entreprises[$numEntreprise]->addStage($stage);

                $manager->persist($stage);
                $manager->persist($entreprises[$numEntreprise]);

            }
            $manager->persist($formation);
        }

        //Envoyer les données en BD
        $manager->flush();
    }
}
