<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'embg',
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function setDoctor(Doctor $doctor)
    {
        $this->doctor()->associate($doctor);
    }

    public function assignedAppointments(): BelongsToMany
    {
        return $this->belongsToMany(
            Doctor::class,
            'appointments',
            'patient_id',
            'doctor_id',
            'id'
        )->withTimestamps();
    }

    public function assignedRemedies(): BelongsToMany
    {
        return $this->belongsToMany(
            Doctor::class,
            'remedies',
            'patient_id',
            'doctor_id',
            'id'
        )->withPivot('name')->withTimestamps();
    }
}
