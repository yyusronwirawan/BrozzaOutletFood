<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  $faker = Faker::create('id_ID');
        //  for ($i = 1; $i <= 10; $i++) {
        //      DB::table('gudangs')->insert([
        //          'nama_gudang' => $faker->name,
        //          'alamat' => $faker->address,
        //          'created_at' => now(),
        //          'updated_at' => now(),
        //      ]);
        //  }
        $faker = Faker::create('id_ID');
        $locations = range('A', 'Z'); // Array huruf A-Z

        for ($i = 0; $i < 26; $i++) {
            $gudangName = 'Gudang ' . $locations[$i];
            $address = $faker->address;

            // Memastikan alamat hanya di Indonesia atau Jawa Timur
            if (!Str::contains($address, ['Indonesia', 'Jawa Timur'])) {
                $address .= ', Jawa Timur';
            }

            DB::table('gudangs')->insert([
                'nama_gudang' => $gudangName,
                'alamat' => $address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
