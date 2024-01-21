<?php

namespace Database\Seeders;

use App\Models\PostalCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postalCodesSeederExample = [
            ['postal_code' => '82130260', 'street_name' => 'Abílio Sebastião da Silva'],
            ['postal_code' => '80230030', 'street_name' => 'Avenida Presidente Getúlio Vargas'],
            ['postal_code' => '80230000', 'street_name' => 'Avenida Silva Jardim'],
            ['postal_code' => '80060010', 'street_name' => 'Rua Marechal Deodoro'],
            ['postal_code' => '80620000', 'street_name' => 'Rua Guilherme Pugsley']
        ];

        foreach ($postalCodesSeederExample as $item) {
            PostalCode::create($item);
        }
    }
}
