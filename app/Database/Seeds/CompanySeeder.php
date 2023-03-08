<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CompanyModel;
use Faker\Factory as FakerFactory;


class CompanySeeder extends Seeder
{
    public function run()
    {
        $model = new CompanyModel();
        $faker = FakerFactory::create('de_DE');

        for ($i = 0; $i < 50; $i++) {

            $data  = [
                'name'     => $faker->company(),
                'street'   => $faker->streetAddress(),
                'postcode' => $faker->postcode(),
                'state'    => $faker->state(),
                'city'     => $faker->city(),
                'country'  => $faker->country(),
            ];
            
            $model->save($data);
        }
    }
}
