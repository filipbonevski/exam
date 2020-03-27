<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class RemediesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::where('name', 'Venko')->first();
        /** @var Order $order */
        $patient = Patient::find(2);

        $patient->setDoctor($doctor);
    	$doctor->assignedRemedies()->attach($patient, ['name' => 'Analgin']);
        $doctor->save();
    }
}
