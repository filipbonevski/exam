<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::where('name', 'Venko')->first();
        
        $patient = new Patient();
        $patient->name = 'Nikola';;
        $patient->surname = 'Gruevski';
        $patient->embg = '01011971';
      	$patient->setDoctor($doctor);
        $patient->save();
  	}
}
