<?php


namespace App\Controller;


use App\Repository\BeerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class QueryBeersByFood
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
                                SerializerInterface $serializer){

        $this->beerRepository = $beerRepository;
        $this->serializer = $serializer;
    }

    /** @Route("/beers") methods={"GET"} */
   public function __invoke(Request $request){

       if(!$request->get('food')){
           throw new HttpException(400,'Food param is required');
       }

       return new Response(
           $this->serializer->serialize($this->beerRepository->findByFood($request->get('food')),'json',['groups'=>'detail']),Response::HTTP_OK, ['Content-type' => 'application/json']
       );
   }
}