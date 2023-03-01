<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('user1@test.com');
        $user1->setPassword(
            $this->userPasswordHasher->hashPassword($user1, '12345678')
        );
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('user2@test.com');
        $user2->setPassword(
            $this->userPasswordHasher->hashPassword($user2, '12345678')
        );
        $manager->persist($user2);

        $admin1 = new User();
        $admin1->setEmail('admin1@test.com');
        $admin1->setPassword(
            $this->userPasswordHasher->hashPassword($admin1, '12345678')
        );
        $admin1->setRoles([
            "ROLE_ADMIN"
        ]);
        $manager->persist($admin1);

        $admin2 = new User();
        $admin2->setEmail('admin2@test.com');
        $admin2->setPassword(
            $this->userPasswordHasher->hashPassword($admin2, '12345678')
        );
        $admin2->setRoles([
            "ROLE_ADMIN"
        ]);
        $manager->persist($admin2);

        $manager->flush();
    }
}
