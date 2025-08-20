<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plumber extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'plumber_report', 'plumber_id', 'report_id');
    }
}
