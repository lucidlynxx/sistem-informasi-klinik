<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $table = 'medicalrecords';

    protected $guarded = ['id'];

    protected $with = ['registration', 'action', 'medicine'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }

    public function action(): BelongsTo
    {
        return $this->belongsTo(Action::class, 'action_id');
    }

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
