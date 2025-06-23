<?php

namespace App\Filament\Resources\AnggotaResource\Pages;

use App\Filament\Resources\AnggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAnggota extends ViewRecord
{
    protected static string $resource = AnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Ini hanya tombol "Edit" di pojok kanan atas, tidak berhubungan dengan isi halaman.
            Actions\EditAction::make(),
        ];
    }
}
