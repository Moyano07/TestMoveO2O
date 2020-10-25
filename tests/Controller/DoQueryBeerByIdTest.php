<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class DoQueryBeerByIdTest extends WebTestCase
{

    /** @test  */
    public function ensureStatusCodeIsSuccess()
    {
        $client = $this->createClient();
        $id = 1;
        $client->request(
            'GET',
            'http://127.0.0.1:8000/beers/'.$id
        );

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test  */
    public function ensureErrorIsControlled()
    {
        $client = $this->createClient();
        $id = 0;
        $client->request(
            'GET',
            'http://127.0.0.1:8000/beers/'.$id
        );

        $response = $client->getResponse();

        $this->assertEquals(500, $response->getStatusCode());

    }


    /** @test  */
    public function ensureIdMatch()
    {
        $client = $this->createClient();
        $id = 1;
        $client->request(
            'GET',
            'http://127.0.0.1:8000/beers/'.$id
        );

        $response = $client->getResponse();

        $beerAsArray = json_decode($response->getContent(),true);

        $this->assertEquals($id, $beerAsArray['id']);
    }
}