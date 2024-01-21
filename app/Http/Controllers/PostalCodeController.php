<?php

namespace App\Http\Controllers;

use App\Repositories\PostalCodeRepository;
use App\Traits\ViaCepTrait;
use Error;
use HighSolutions\LaravelSearchy\Facades\Searchy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    use ViaCepTrait;

    public function __construct(private PostalCodeRepository $postalCodeRepository){}

    public function show($postalCode): JsonResponse
    {
        $responseData = $this->postalCodeRepository->searchByPostalCode($postalCode);

        if(empty($responseData))
        {   
            try {
                $viaCepData = $this->checkPostalCode($postalCode);
            } catch (Error $e) {
                return response()->json([
                    'data' => ['message' => $e->getMessage()]
                ], 422);
            }
            $responseData = $this->postalCodeRepository->createPostalCodeFromViaCep($viaCepData);
        }

        return response()->json([
            'data' => $responseData
        ]);
    }

    public function searchByName(Request $request)
    {
        if(!$request->has('search_text')) {
            return response()->json([
                'data' => ['message' => 'É preciso enviar o termo de busca']
            ], 422);
        }

        $fuzzySearchResults = Searchy::search('postal_codes')->fields('street_name')->query($request->get('search_text'))->get();
        
        return response()->json([
            'data' => $fuzzySearchResults
        ]);
    }
}
