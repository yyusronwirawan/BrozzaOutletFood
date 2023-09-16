<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DataUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     [
        //         'nama_pengguna' => 'Administrator',
        //         'email' => 'admin@gmail.com',
        //         'username' => 'admin',
        //         'alamat' => 'Jl. Raya Cibaduyut',
        //         'password' => bcrypt('123456'),
        //         'tlp' => '081234567890',
        //         'status' => 'Terkonfirmasi',
        //         'pegawai_id' => 1,
        //     ],
        //     // [
        //     //     'nama_pengguna' => 'Pegawai',
        //     //     'email' => 'pegawai@gmail.com',
        //     //     'username' => 'Pegawai',
        //     //     'password' => bcrypt('123456'),
        //     //     'alamat' => 'Jl. Raya Cibaduyut',
        //     //     'tlp' => '081234567890',
        //     //     'pegawai_id' => 2,
        //     // ],
        //     // [
        //     //     'nama_pengguna' => 'Outlet',
        //     //     'email' => 'outlet@gmail.com',
        //     //     'username' => 'outlet',
        //     //     'password' => bcrypt('123456'),
        //     //     'alamat' => 'Jl. Raya Cibaduyut',
        //     //     'tlp' => '081234567890',
        //     //     'pegawai_id' => 3,
        //     // ],
        //     // [
        //     //     'nama_pengguna' => 'Supir',
        //     //     'email' => 'supir@gmail.com',
        //     //     'username' => 'Supir',
        //     //     'alamat' => 'Jl. Raya Cibaduyut',
        //     //     'password' => bcrypt('123456'),
        //     //     'tlp' => '081234567890',
        //     //     'pegawai_id' => 4,
        //     // ]
        // ]);
        // $faker = Faker::create('id_ID');
        // $users = [];
        // $password = bcrypt('123456');

        // // Tambahkan data untuk username outlet 1-20 dengan pegawai_id=3
        // for ($i = 1; $i <= 20; $i++) {
        //     $users[] = [
        //         'nama_pengguna' => $faker->name,
        //         'email' => 'outlet' . $i . '@gmail.com',
        //         'username' => 'outlet' . $i,
        //         'password' => $password,
        //         'alamat' => $faker->address,
        //         'tlp' => '081234567890',
        //         'status' => 'Belum Terkonfirmasi',
        //         'pegawai_id' => 3,
        //     ];
        // }

        // // Tambahkan data untuk pegawai 1-20 dengan pegawai_id=2
        // for ($i = 1; $i <= 20; $i++) {
        //     $users[] = [
        //         'nama_pengguna' => $faker->name,
        //         'email' => 'pegawai' . $i . '@gmail.com',
        //         'username' => 'pegawai' . $i,
        //         'password' => $password,
        //         'alamat' => $faker->address,
        //         'tlp' => '081234567890',
        //         'status' => 'Belum Terkonfirmasi',
        //         'pegawai_id' => 2,
        //     ];
        // }

        // // Tambahkan data untuk supir 1-20 dengan pegawai_id=4
        // for ($i = 1; $i <= 20; $i++) {
        //     $users[] = [
        //         'nama_pengguna' => $faker->name,
        //         'email' => 'supir' . $i . '@gmail.com',
        //         'username' => 'supir' . $i,
        //         'password' => $password,
        //         'alamat' => $faker->address,
        //         'tlp' => '081234567890',
        //         'status' => 'Belum Terkonfirmasi',
        //         'pegawai_id' => 4,
        //     ];
        // }

        // DB::table('users')->insert($users);
    }
}
