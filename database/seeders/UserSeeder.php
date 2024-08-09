<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use App\Models\Bagian;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'id' => 1,
            'tanggal_penggajian_bulanan' => 1,
        ]);
        Bagian::create([
            'id' => 1,
            'name' => 'Owner',
            'gaji' => 0
        ]);
        Bagian::create([
            'id' => 2,
            'name' => 'Keuangan',
            'gaji' => 3000000
        ]);
        Bagian::create([
            'id' => 3,
            'name' => 'Kepegawaian',
            'gaji' => 2500000
        ]);
        Bagian::create([
            'id' => 4,
            'name' => 'Operator',
            'gaji' => 2000000
        ]);

        User::create([
            'id' => 1,
            'bagian_id' => 1,
            'name' => 'owner',
            'email' => 'owner@mail.id',
            'password' => bcrypt('12345678'),
            'role' => 'pemilik'
        ]);

        User::create([
            'id' => 2,
            'bagian_id' => 2,
            'name' => 'bagkeuangan',
            'email' => 'bagkeuangan@mail.id',
            'password' => bcrypt('12345678'),
            'role' => 'keuangan'
        ]);

        User::create([
            'id' => 3,
            'bagian_id' => 3,
            'name' => 'bagkepegawaian',
            'email' => 'bagkepegawaian@mail.id',
            'password' => bcrypt('12345678'),
            'role' => 'kepegawaian'
        ]);

        User::create([
            'id' => 4,
            'bagian_id' => 4,
            'name' => 'karyawan',
            'email' => 'karyawan@mail.id',
            'password' => bcrypt('12345678'),
            'role' => 'karyawan'
        ]);
    }
}
