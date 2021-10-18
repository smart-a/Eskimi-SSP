<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\Banner;
use Illuminate\Database\Seeder;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=1; $i<=5; $i++){
            $advert = Advert::create([
                'advert_name' => $faker->name(),
                'date_from' => $faker->date(),
                'date_to' => $faker->date(),
                'daily_budget' => $i,
                'total_budget' => $i * 5
            ]);
            $id = $advert->fresh()->id;
            for($j=1; $j<=rand(1,3); $j++){
                Banner::create([
                    'advert_id' => $id,
                    'image' => '/storage/uploads/seeder_banner.png'
                ]);
            }
        }
    }
}
