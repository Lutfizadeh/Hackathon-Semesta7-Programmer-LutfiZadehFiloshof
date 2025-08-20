<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // Redirect ke user index setelah add user
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
