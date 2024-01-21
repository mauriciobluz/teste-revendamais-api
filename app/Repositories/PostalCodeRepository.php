<?php

namespace App\Repositories;

use App\Models\PostalCode;

class PostalCodeRepository implements PostalCodeRepositoryInterface 
{
    public function createPostalCodeFromViaCep(array $viaCepData) {
        return PostalCode::create(['postal_code' => preg_replace("/[^0-9]/", "", $viaCepData['cep']), 'street_name' => $viaCepData['logradouro']]);
    }

    public function searchByPostalCode($postalCode) {
        return PostalCode::where('postal_code', $postalCode)->first();
    }

    public function deletePostalCode($id) {
        return PostalCode::destroy($id);
    }

    public function updateProduct($id, array $postalCodeData) {
        return PostalCode::whereId($id)->update($postalCodeData);
    }
}