<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientFrontControllerTest extends WebTestCase
{
    public function testAjoutercommande()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouterCommande');
    }

    public function testListercommandes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listerCommandes');
    }

}
