<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostalCodeRequest;
use App\Http\Resources\PostalCodeResource;
use App\Http\Resources\PostalCodeResourceCollection;
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

    public function create(CreatePostalCodeRequest $request): PostalCodeResource
    {
        return new PostalCodeResource($this->postalCodeRepository->create($request));
    }

    public function edit(CreatePostalCodeRequest $request, string $id): PostalCodeResource
    {
        return new PostalCodeResource($this->postalCodeRepository->update($id, $request));
    }

    public function destroy($id)
    {
        $destroyed = $this->postalCodeRepository->delete($id);

        return response()->json(null, $destroyed ? 200 : 404);
    }

    public function show($postalCode): PostalCodeResource | JsonResponse
    {
        $responseData = $this->postalCodeRepository->searchByPostalCode($postalCode);

        if(empty($responseData))
        {   
            try {
                $viaCepData = $this->checkPostalCode($postalCode);
            } catch (Error $e) {
                return response()->json(['message' => $e->getMessage()], 422);
            }
            $responseData = $this->postalCodeRepository->createPostalCodeFromViaCep($viaCepData);
        }

        return new PostalCodeResource($responseData);
    }

    public function searchByName(Request $request)
    {
        if(!$request->has('search_text')) {
            return response()->json(['message' => 'É preciso enviar o termo de busca'], 422);
        }

        $fuzzySearchResults = Searchy::search('postal_codes')->fields('street_name')->query($request->get('search_text'))->get();
        
        return new PostalCodeResourceCollection($fuzzySearchResults);
    }
}
