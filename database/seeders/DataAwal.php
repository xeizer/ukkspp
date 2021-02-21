<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DataAwal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peran = new Role();
        $peran->name = 'admin';
        $peran->save();

        $peran = new Role();
        $peran->name = 'petugas';
        $peran->save();

        $peran = new Role();
        $peran->name = 'siswa';
        $peran->save();

        $user = new User();
        $user->name = 'Admin Utama';
        $user->email = 'admin@smkn7ptk.sch.id';
        $user->password = bcrypt('1234567890');
        $user->save();
        $user->attachRole('admin');

        $user = new User();
        $user->name = 'Petugas';
        $user->email = 'petugas@smkn7ptk.sch.id';
        $user->password = bcrypt('1234567890');
        $user->save();
        $user->attachRole('petugas');
    }
}
