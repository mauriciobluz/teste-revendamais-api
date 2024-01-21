<?php

namespace App\Repositories;

use App\Http\Requests\CreatePostalCodeRequest;
use App\Models\PostalCode;

class PostalCodeRepository implements PostalCodeRepositoryInterface 
{
    public function create(CreatePostalCodeRequest $data)
    {
        return PostalCode::create(['postal_code' => $data->get('postal_code'), 'street_name' => $data->get('street_name')]);
    }

    public function update($id, CreatePostalCodeRequest $data)
    {
        PostalCode::whereId($id)->update(['postal_code' => $data->get('postal_code'), 'street_name' => $data->get('street_name')]);
        return PostalCode::whereId($id)->first();
    }

    public function delete($id)
    {
        return PostalCode::destroy($id);
    }

    public function createPostalCodeFromViaCep(array $viaCepData) 
    {
        return PostalCode::create(['postal_code' => preg_replace("/[^0-9]/", "", $viaCepData['cep']), 'street_name' => $viaCepData['logradouro']]);
    }

    public function searchByPostalCode($postalCode)
    {
        return PostalCode::where('postal_code', $postalCode)->first();
    }

    public function deletePostalCode($id)
    {
        return PostalCode::destroy($id);
    }

    public function updateProduct($id, array $postalCodeData)
    {
        return PostalCode::whereId($id)->update($postalCodeData);
    }
}