<?php


namespace App\Tests\Beer;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DoQueryBeersByFoodTest extends WebTestCase
{

    /** @test  */
    public function ensureParamFoodIsReceived()
    {
        $client = $this->createClient();
        $food = '';
        $client->request(
            'GET',
            'http://127.0.0.1:8000/beers?food='.$food
        );

        $response = $client->getResponse();

        $this->assertEquals(400, $response->getStatusCode());
    }

    /** @test  */
    public function ensureStatusCodeIsSuccess()
    {
        $client = $this->createClient();
        $food = 'carne';
        $client->request(
            'GET',
            'http://127.0.0.1:8000/beers?food='.$food
        );

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }


}