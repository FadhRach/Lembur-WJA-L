<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name'=>'Manager LA WJA',
                'email'=>'manager@example.com',
                'password'=> bcrypt('manager123'),
                'role'=>'manager',
                'mitra'=>'pkl',
                'jabatan'=>'jendral manager',
                'nik'=>'0067066812',
                'alamat'=>'kebon kopi',
                'no_telp'=>'089518921739',
                'foto'=>'Profile_Icon.png',
            ],
            [
                'name'=>'Engineer LA WJA',
                'email'=>'engineer@example.com',
                'password'=> bcrypt('engineer123'),
                'role'=>'engineer',
                'mitra'=>'pkl',
                'jabatan'=>'senior engineer',
                'nik'=>'0316161',
                'alamat'=>'kebon cau',
                'no_telp'=>'08916119381',
                'foto'=>'Profile_Icon.png',
            ],
            [
                'name'=>'Karyawan LA WJA',
                'email'=>'karyawan@example.com',
                'password'=> bcrypt('karyawan123'),
                'role'=>'karyawan',
                'mitra'=>'pkl',
                'jabatan'=>'jendral teknisi',
                'nik'=>'0028316391',
                'alamat'=>'pojok',
                'no_telp'=>'08967341441',
                'foto'=>'Profile_Icon.png',
            ],
        ];

        foreach($userdata as $key => $val){
            User::create($val);
        }
    }
}
