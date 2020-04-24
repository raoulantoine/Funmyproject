<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ContributionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contribution = new Contribution();
        $contribution->setAmount(1000.00);
        $contribution->setUser($this->getReference("john"));
        $contribution->setProject($this->getReference("goodgirl"));
        $this->setReference("amount", $contribution); //implements contribution
        $manager->persist($contribution);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            ProjectFixtures::class,
            UserFixtures::class
        ];
    }
}
