<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientAdressControllerControllerTest extends WebTestCase
{
    public function testClientupdateadress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/clientUpdateAdress');
    }

}
