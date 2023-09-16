<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['hakakses' => 'Admin'],
            ['hakakses' => 'Pegawai'],
            ['hakakses' => 'Outlet'],
            ['hakakses' => 'Supir'],
        ];
        foreach ($data as $d) {
            DB::table('pegawais')->insert([
                'hakakses' => $d['hakakses'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
