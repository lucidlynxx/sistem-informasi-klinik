<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $guarded = ['id'];

    protected $with = ['medicalrecord'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function medicalrecord(): BelongsTo
    {
        return $this->belongsTo(MedicalRecord::class, 'medicalrecord_id');
    }
}
