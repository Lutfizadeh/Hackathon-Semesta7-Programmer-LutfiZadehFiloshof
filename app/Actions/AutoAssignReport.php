<?php

namespace App\Actions;

use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class AutoAssignReport
{
    // Handle auto assign ke supervisor
    public function handle()
    {
        // Kalau table belum ada, langsung keluar
        if(!Schema::hasTable('roles') || !Schema::hasTable('users')) {
            return;
        }

        // Kalau role supervisor belum dibuat, diam
        if(!Role::where('name', 'supervisor')->exists()) {
            return;
        }

        // Ambil satu supervisor, kalau belum ada usernya, diam
        $supervisor = User::role('supervisor')->first();

        if (!$supervisor) {
            return;
        }

        // Ambil reports
        $reports = Report::where('status', 'baru')
            ->where('created_at', '<=', Carbon::now()->subHours(2))
            ->get();

        // Mapping
        foreach ($reports as $report) {
            $report->update([
                'assigned_to' => $supervisor->id,
                'status' => 'terlambat',
            ]);
        }

        return $reports->count();
    }
}
