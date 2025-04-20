<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaApplication extends Model
{
    protected $fillable = [
        'client_id',
        'visa_type',
        'purpose',
        'status',
        'admin_notes',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
