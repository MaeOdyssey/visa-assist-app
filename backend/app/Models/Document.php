<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'visa_application_id',
        'name',
        'path',
        'type',
        'status',
    ];

    public function visaApplication()
    {
        return $this->belongsTo(VisaApplication::class);
    }
}
