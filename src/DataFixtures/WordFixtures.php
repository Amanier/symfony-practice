<?php

namespace App\DataFixtures;

use App\Entity\Word;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class WordFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $word = new Word();

        $word->setFrench('Jaune');
        $word->setEnglish('Yellow');

        $manager->persist($word);
        $manager->flush();
    }
}
