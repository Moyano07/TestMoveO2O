<?php


namespace App\Controller;


use App\Entity\Beer;
use App\Repository\BeerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QueryBeerById
{

    /**
     * @var BeerRepository
     */
    private $beerRepository;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(BeerRepository $beerRepository,
                                SerializerInterface $serializer
    )
    {

        $this->beerRepository = $beerRepository;
        $this->serializer = $serializer;
    }

    /** @Route("/beers/{id}") methods={"GET"} */
    public function __invoke($id)
    {
        /** @var Beer $beer */
        $beer = $this->beerRepository->find($id);
        if(!$beer){
            throw new \Exception('Beer not found!');
        }

        return new Response(
            $this->serializer->serialize($beer,'json',['groups'=>'detail']),Response::HTTP_OK, ['Content-type' => 'application/json']
        );
    }
}