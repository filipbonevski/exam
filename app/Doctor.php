<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'embg',
        'licenceNumber'
    ];

    public function patients()
    {
        $this->hasMany(Patient::class, 'patient_id', 'id');
    }

    public function setPatient(Patient $patient)
    {
        $this->patient()->associate($patient);
    }

    public function assignedAppointments(): BelongsToMany
    {
        return $this->belongsToMany(
            Patient::class,
            'appointments',
            'doctor_id',
            'patient_id',
            'id'
        )->withTimestamps();
    }

    public function assignedRemedies(): BelongsToMany
    {
        return $this->belongsToMany(
            Patient::class,
            'remedies',
            'doctor_id',
            'patient_id',
            'id'
        )->withPivot('name')->withTimestamps();
    }

    public function assignAppointmentToPatient(Patient $patient)
    {
        $this->assignedAppointments()->attach($patient);
    }

    public function assignRemedyToPatient(Patient $patient)
    {
        $this->assignedRemedies()->attach($patient);
    }
}
