<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = Doctor::where('name', 'Filip')->first();
        /** @var Order $order */
        $patient = Patient::find(1);

        $patient->setDoctor($doctor);
        $doctor->assignAppointmentToPatient($patient);
        $doctor->save();
        
    }
}
