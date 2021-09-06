<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nik = 123;
        $user->nama = "Aditya Fakhri";
        $user->password = bcrypt('123'); 
        $user->jabatan = "Pemilik";
        $user->role = "admin";
        $user->save();
    }
}
