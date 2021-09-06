<?php

use Illuminate\Database\Seeder; 
use Carbon\Carbon;
use App\Jurusan; 

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
        [
        	'jurusan' => 'IPA' 
        ],[
        	'jurusan' => 'IPS'
        ]
        ]);
    }
}
