<?php

use Illuminate\Database\Seeder; 
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'MiminAgendaOnline',
        	'email' => 'anotheriyyu29@gmail.com',
        	'email_verified_at' => Carbon::now(),
        	'password' => Bcrypt('123123123'),
        	'roles' => 'ADMIN'
        ]);
    }
}
