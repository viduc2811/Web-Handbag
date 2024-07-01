<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'product_description' => $faker->sentence,
                'product_content' => $faker->paragraph,
                'menu_id' => $faker->numberBetween(1, 10),
                'thumb' => $faker->imageUrl(640, 480, 'technics', true),
                'product_quantity' => $faker->numberBetween(1, 100),
                'product_price' => $faker->numberBetween(1000, 1000000),
                'price_sale' => $faker->optional()->numberBetween(1000, 1000000),
                'active' => $faker->numberBetween(0, 1),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
