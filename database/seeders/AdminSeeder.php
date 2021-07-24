<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name'=>'Super',
                'last_name'=>'Admin',
                'email'=>'piyushmaharjan22@gmail.com',
                'type'=>0,
                'image'=>'uploads/Admin/user.jpg',
                'password'=>bcrypt('secret'),
                'created_at'=>\Carbon\Carbon::now()
            ]
        ]);
    }
}
