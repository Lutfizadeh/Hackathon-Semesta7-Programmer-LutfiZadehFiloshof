<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    protected $fillable = [
        'description',
        'location',
        'unit',
        'image',
        'category',
        'selfie',
        'status',
        'user_id',
        'supervisor_id',
    ];

    // Filtering report yang bisa dilihat by user logined
    public function scopeAccessibleBy(Builder $query, $user = null): Builder
    {
        $roleCategory = [
            'electrician' => 'electric',
            'janitor' => 'janitation',
            'plumber' => 'plumbing',
            'security' => 'security',
        ];

        $user = Auth::user() ?? $user;
        $role = $user->getRoleNames()->first();

        // Validasi admin
        if($role === 'super_admin' || $role === 'supervisor') {
            return $query;
        }

        // Jika visitor, tampilkan punya sendiri
        if($role === 'visitor') {
            return $query->where('user_id', $user->id);
        }

        $category = $roleCategory[$role] ?? null;

        if($category) {
            return $query->where('category', $category);
        }

        // Ketika role tidak ditemukan, maka tidak menampilkan apapun
        return $query->whereRaw('0 = 1');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function electricians()
    {
        return $this->belongsToMany(Electrician::class, 'electrician_report');
    }

    public function janitors()
    {
        return $this->belongsToMany(Janitor::class, 'janitor_report');
    }

    public function plumbers()
    {
        return $this->belongsToMany(Plumber::class, 'plumber_report');
    }
    public function securities()
    {
        return $this->belongsToMany(Security::class, 'security_report');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
}
