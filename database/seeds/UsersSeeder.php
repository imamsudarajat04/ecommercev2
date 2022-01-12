<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@shop.com',
            'dateBirth' => '2001-08-04',
            'gender' => 'Male',
            'password' => bcrypt('admin'),
            'address' => 'Jl. Ganet Block B1 No. 09',
            'phone' => '083183462191',
            'role' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
