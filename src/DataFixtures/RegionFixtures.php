<?php

namespace App\DataFixtures;

use app\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RegionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $region = new Region();
        $region->setName("admin");
        $region->setDescription("flo");
        $region->setCarteSvg("");
        $region->setNomBdd("");
        
        
        $manager->persist($region);

        $manager->flush();
    }
}
