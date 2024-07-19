<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Juan Felipe',
            'last_name' => 'Dorado Guzman',
            'document_type' => 1,
            'document_number' => '12345678',
            'email' => 'pipedorado14@gmail.com',
            'phone' => '87654321',
            'password'=> bcrypt('12345678'),
        ]);

        $this->call([
            FamilySeeder::class,
            OptionSeeder::class,
        ]);

        Product::factory(500)->create();

    }
}
