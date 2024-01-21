<?php 

namespace App\Repositories;

interface PostalCodeRepositoryInterface
{
    public function createPostalCodeFromViaCep(array $viaCepData);
    public function searchByPostalCode($postalCode);
    public function deletePostalCode($id);
    public function updateProduct($id, array $postalCodeData);
}