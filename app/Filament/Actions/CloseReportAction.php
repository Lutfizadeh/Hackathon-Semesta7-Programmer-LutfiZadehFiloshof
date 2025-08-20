<?php

namespace App\Filament\Actions;

use App\Models\Report;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;

class CloseReportAction
{
    public static function make(): Action
    {
        return Action::make('close')
            ->label('Close Report')
            ->action(function(Report $record) {
                $record->update([
                    'status' => 'closed',
                    'closed_at' => now(),
                ]);
            })
            ->requiresConfirmation()
            ->color('success')
            ->visible(fn($record) => self::isVisible($record));
    }
    
    // Handle close report
    public static function handle(Report $report): void
    {
        $report->update([
            'status' => 'closed',
            'closed_at' => now(),
        ]);
    }

    // Cek kondisi tombol
    public static function isVisible(Report $report): bool
    {
        $user = Auth::user();
        
        // Validasi user
        if(!$user || !$user->role) {
            return false;
        }
        
        // Check specific roles yang mungkin ada
        $role = $user->getRoleNames()->first();

        if(!$role || !$report || !$report->category) {
            return false;
        }

        // Validasi user
        if($report->status === 'closed') {
            return false;
        }

        // Validasi report category
        if(!$report || !$report->category) {
            return false;
        }

        // Hide jika lebih dari 2 jam
        if($report->created_at->addHours(2)->lt(now())) {
            return false;
        }

        // Cek role ke kategori
        $canClose = self::canClose($user->role, $report->category);

        // Cek role ke kategori
        return $canClose;
    }

    // Kategori yang bisa close report sesuai dengan role
    private static function canClose(string $role, string $category): bool
    {
        if($role === 'super_admin' || $role === 'supervisor') {
            return true;
        }
        
        $roleCategory = [
            'electrician' => 'electric',
            'janitor' => 'janitation',
            'plumber' => 'plumbing',
            'security' => 'security',
        ];

        return isset($roleCategory[$role]) && $roleCategory[$role] === $category;
    }
}
