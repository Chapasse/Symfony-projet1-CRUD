<?php

namespace App\DataFixtures;

use App\Entity\Employes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EmployesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 15; $i++) { 
            # code...
            $employes = new Employes();
            
            $employes   ->setPrenom("Prenom n°$i")
                        ->setNom("Nom n°$i")
                        ->setTelephone("0123456789")
                        ->setEmail("Email n°$i")
                        ->setAdresse("Adresse n°$i")
                        ->setPoste("Poste n°$i")
                        ->setSalaire(1250*$i)
                        ->setDatenaissance(date_create("1994-01-10"));                    
            
            $manager->persist($employes);
        }
            
        $manager->flush();
    }
}
