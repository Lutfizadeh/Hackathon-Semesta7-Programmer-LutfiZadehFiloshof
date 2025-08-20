<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'security_report', 'security_id', 'report_id');
    }
}
