<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Electrician extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'electrician_report', 'electrician_id', 'report_id');
    }
}
