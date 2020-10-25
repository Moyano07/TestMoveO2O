<?php


namespace App\Controller;


use App\Entity\Beer;
use App\Repository\BeerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class QueryBeerById
{

    /**
     * @var BeerRepository
     */
    private $beerRepository;

    public function __construct(BeerRepository $beerRepository)
    {

        $this->beerRepository = $beerRepository;
    }

    /** @Route("/beers/{id}") methods={"GET"} */
    public function __invoke($id)
    {
        /** @var Beer $beer */
        $beer = $this->beerRepository->find($id);
        if(!$beer){
            throw new \Exception('Beer not found!');
        }

        return new JsonResponse($beer);
    }
}