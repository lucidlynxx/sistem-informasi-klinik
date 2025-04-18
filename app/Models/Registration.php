<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';

    protected $guarded = ['id'];

    protected $with = ['patient'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function medicalrecords(): HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
