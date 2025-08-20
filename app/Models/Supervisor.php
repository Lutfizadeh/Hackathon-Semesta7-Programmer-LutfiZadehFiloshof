<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
