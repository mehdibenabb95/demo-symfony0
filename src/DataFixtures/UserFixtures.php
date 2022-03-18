<?php
//https://sharemycode.fr/icg
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setNom('BOUVANESVARY');
        $user->setPrenom('Soupramanien');
        $user->setDateInscription(new \DateTime());
        $user->setEmail('soupra@test.fr');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'test'));
        $manager->persist($user);
        $user2 = new User();
        $user2->setNom('toto');
        $user2->setPrenom('titi');
        $user2->setDateInscription(new \DateTime("2020-12-24"));
        $user2->setEmail('toto@test.fr');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'test'));
        $manager->persist($user2);
        $manager->flush();
    }
}
