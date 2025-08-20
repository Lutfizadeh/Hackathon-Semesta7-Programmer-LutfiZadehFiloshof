<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReport extends CreateRecord
{
    protected static string $resource = ReportResource::class;

    // Redirect ke report index setelah create report
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
