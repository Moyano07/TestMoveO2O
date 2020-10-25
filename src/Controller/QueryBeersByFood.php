<?php


namespace App\Controller;


use App\Repository\BeerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class QueryBeersByFood
{
    /**
     * @var BeerRepository
     */
    private $beerRepository;

    public function __construct(BeerRepository $beerRepository){

        $this->beerRepository = $beerRepository;
    }

    /** @Route("/beers") methods={"GET"} */
   public function __invoke(Request $request){

       if(!$request->get('food')){
           throw new HttpException(400,'Food param is required');
       }
       return new JsonResponse($this->beerRepository->findByFood($request->get('food')));
   }
}