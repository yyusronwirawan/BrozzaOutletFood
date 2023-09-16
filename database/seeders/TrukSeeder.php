<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jenis_truk' => 'Tronton Wingbox',
                'plat_nomor' => 'B 1234 XYZ',
                'kapasitas' => '18.000 kg',
            ],
            [
                'jenis_truk' => 'Tronton',
                'plat_nomor' => 'B 5678 XYZ',
                'kapasitas' => '15.000 kg',
            ],
            [
                'jenis_truk' => 'Fuso Box',
                'plat_nomor' => 'B 9101 XYZ',
                'kapasitas' => '8.000 kg',
            ],
            [
                'jenis_truk' => 'CDD Long',
                'plat_nomor' => 'B 1122 XYZ',
                'kapasitas' => '5.000 kg',
            ],
            [
                'jenis_truk' => 'Double Engkel',
                'plat_nomor' => 'B 3344 XYZ',
                'kapasitas' => '4.000 kg',
            ],
            [
                'jenis_truk' => 'Engkel Box',
                'plat_nomor' => 'B 5566 XYZ',
                'kapasitas' => '2.200 kg',
            ],
            [
                'jenis_truk' => 'Small Box',
                'plat_nomor' => 'B 7788 XYZ',
                'kapasitas' => '800 kg',
            ],
            [
                'jenis_truk' => 'Pickup',
                'plat_nomor' => 'B 9900 XYZ',
                'kapasitas' => '800 kg',
            ],
            [
                'jenis_truk' => 'Van',
                'plat_nomor' => 'B 1122 ABC',
                'kapasitas' => '720 kg',
            ],
            [
                'jenis_truk' => 'Ekonomi',
                'plat_nomor' => 'B 3344 ABC',
                'kapasitas' => '150 kg',
            ],
        ];

        DB::table('truks')->insert($data);
    }
}
