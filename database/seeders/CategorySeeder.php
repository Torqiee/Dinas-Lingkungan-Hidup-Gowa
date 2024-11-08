<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table to remove all previous records
        Category::truncate();

        // Initialize Faker
        $faker = Faker::create();

        // Define how many categories you want to seed (default is 10, can be overridden)
        $numberOfCategories = env('CATEGORY_SEED_COUNT', 10);

        // Seed multiple categories dynamically
        for ($i = 0; $i < $numberOfCategories; $i++) {
            Category::create([
                'name' => $faker->word,
                'penanggung_perusahaan' => $faker->name,
                'no_telp' => $faker->phoneNumber,
                'alamat_perusahaan' => $faker->address,
                'kordinat' => $faker->latitude . ',' . $faker->longitude,
                'nib' => $faker->uuid,
                'npwp' => $faker->numerify('##.###.###.###.###'),
                'is_active' => $faker->boolean(80),
            ]);
        }

        $this->command->info("Seeded $numberOfCategories categories.");
    }
}
