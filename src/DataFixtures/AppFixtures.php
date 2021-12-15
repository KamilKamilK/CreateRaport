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
        $dateArray = ['2021-01-01', '2021-02-01','2021-03-01','2021-04-01'];
        $timeArray = ['10:50', '02:50','06:50','09:43'];

            for ($i = 0; $i < 10; $i++) {
                $export = new Export();

                $export->setName('Test' . rand(0, 100));
                shuffle($dateArray);
                foreach ($dateArray as $date) {
                    $export->setDate(new DateTime($date));
                }
                shuffle($timeArray);
                foreach ($timeArray as $time) {
                    $export->setHour(new DateTime('@' . strtotime($time)));
                }
                $export->setUser('User ' . rand(0, 100));
                $export->setPlaceName('lokal ' . rand(0, 100));

                $manager->persist($export);
            }


        $manager->flush();
    }
}
