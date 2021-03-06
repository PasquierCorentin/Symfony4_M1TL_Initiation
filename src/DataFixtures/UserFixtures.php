<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setEmail('admin@test.fr');
        $user->setPassword($this->encoder->encodePassword($user,"Admin"));
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setFirstName("admin");
        $user->setLastName("test");
        $user->setAddress("test_adress");
        $user->setCity("test_city");
        $user->setCountry("test_country");
        $manager->persist($user);

        $user = new User();
        $user->setEmail('user@test.fr');
        $user->setPassword($this->encoder->encodePassword($user,"User"));
        $user->setRoles(["ROLE_USER"]);
        $user->setFirstName("user");
        $user->setLastName("test");
        $user->setAddress("test_adress");
        $user->setCity("test_city");
        $user->setCountry("test_country");
        $manager->persist($user);

        $manager->flush();
    }
}
