<?php

namespace App\Traits;

use Error;
use Illuminate\Support\Facades\Http;

trait ViaCepTrait
{
    protected $url = 'https://viacep.com.br/ws/';

    public function getDefaultHeaders() {
        return [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ];
    }

    public function checkPostalCode($postalCode)
    {
        $postalCodeResponse = Http::withHeaders(
            $this->getDefaultHeaders()
        )->get($this->url . "$postalCode/json/");
        
        $data = $postalCodeResponse->json();
        
        if(empty($data) || isset($data['erro'])) {
            throw new Error('CEP Inválido');
        }

        return $data;
    }
}