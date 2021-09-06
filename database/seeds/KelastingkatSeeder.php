<?php

use Illuminate\Database\Seeder;
use App\Kelas_tingkat;
use Carbon\Carbon;

class KelastingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas_tingkat')->insert([
        [
        	'kelas_tingkat' => 'X IPA',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ],[
        	'kelas_tingkat' => 'X IPS',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()

        ],[
        	'kelas_tingkat' => 'XI IPA',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()

        ],[
        	'kelas_tingkat' => 'XI IPS',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()

        ],[
        	'kelas_tingkat' => 'XII IPA',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()

        ],[
        	'kelas_tingkat' => 'XII IPS',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]
        ]); 
    }
}
