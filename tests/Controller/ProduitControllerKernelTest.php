<?php

namespace App\Tests\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


use function PHPUnit\Framework\assertEquals;

class ProduitControllerKernelTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        $routerService = self::$container->get('router');
        //$myCustomService = self::$container->get(CustomService::class);
    }
    
    public function testProduitRepository(): void
    {
        $kernel = self::bootKernel();

        
        $container = static::getContainer();
        $repo = $container->get(ProduitRepository::class);
        $produitList = $repo->findAll();
        assertEquals(10,count($produitList), "on attends 10 produits");
        
        //$myCustomService = self::$container->get(CustomService::class);
    }
   

    
}
