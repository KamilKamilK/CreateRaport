<?php

namespace App\DataFixtures;

use App\Entity\Export;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <10; $i++) {
            $export = new Export();

            $export->setName('Test' . rand(0,100));
            $export->setDate(new \DateTime('2021-01-01' ));
            $export->setHour(new \DateTime('@'.strtotime('now')));
            $export->setUser('User ' . rand(0,100));
            $export->setPlaceName('lokal ' . rand(0,100));

            $manager->persist($export);
        }

        $manager->flush();
    }
}
