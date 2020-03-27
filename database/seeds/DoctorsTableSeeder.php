<?php

use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$doctor = new Doctor();

        $doctor->name = 'Venko';
        $doctor->surname = 'Filipce';
        $doctor->embg = '06061975';
        $doctor->licenceNumber = '13';

        $doctor->save();
    }
}
