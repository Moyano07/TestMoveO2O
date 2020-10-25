<?php


namespace App\Repository;


use App\Entity\Beer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BeerRepository
{

    /**
     * @var HttpClientInterface
     */
    private $client;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(HttpClientInterface $client,
                                SerializerInterface $serializer
    )
    {

        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function find(int $id):?Beer
    {
        $response = $this->client->request(
            'GET',
            'https://api.punkapi.com/v2/beers/' . $id
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }
        /** @var  $beers Beer[] */
        $beers = $this->serializer->deserialize(
            $response->getContent(),
            Beer::class . '[]',
            'json'
        );

        if (count($beers) === 0) {
            return null;
        }

        return $beers[0];
    }

    public function findByFood(string $food): array
    {

        $response = $this->client->request(
            'GET',
            'https://api.punkapi.com/v2/beers',
            ['query' => ['food' => $food]]
        );

        if ($response->getStatusCode() !== 200) {
            return [];
        }

        return $this->serializer->deserialize(
            $response->getContent(),
            Beer::class . '[]',
            'json'
        );
    }
}