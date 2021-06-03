<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    // ------ PROPRIETES ------ //
    private $encoder;
    // ----- CONSTRUCTEUR ----- //
    // On fait une injection de dépendance dans le constructeur pour pouvoir
    // utiliser l'encoder de password de Symfony dans la fixture
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    // ------- METHODES ------- //
    public function load(ObjectManager $manager)
    {
        $user = new Utilisateur();
        // $user->setNom("Test");
        // $user->setPrenom("Jean");
        $user->setEmail("jeantest@test.com");
        $user->setRoles(["ROLE_USER"]);
        // Mise en place du password
        $originePassword = "pass";
        $encodedPassword = $this->encoder->encodePassword($user, $originePassword);
        $user->setPassword($encodedPassword);
        //
        $manager->persist($user);

        $user = new Utilisateur();
        // $user->setNom("admin");
        // $user->setPrenom("flo");
        $user->setEmail("admin@admin.com");
        $user->setRoles(["ROLE_ADMIN"]);
        // Mise en place du password
        $originePassword = "admin";
        $encodedPassword = $this->encoder->encodePassword($user, $originePassword);
        $user->setPassword($encodedPassword);
        //
        $manager->persist($user);

        $manager->flush();
    }
}