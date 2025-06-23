<?php

namespace App\Filament\Widgets;

use App\Models\Anggota; // pastikan modelnya diimport
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class JumlahAnggota extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Anggota Terverifikasi', Anggota::where('status', 'verified')->count())
                ->description('Total anggota yang terdaftar')
                ->icon('heroicon-o-users')
                ->color('success'),
            Stat::make('Anggota Belum Diverifikasi', Anggota::where('status', 'pending')->count())
                ->description('Perlu ditinjau')
                ->color('warning')
                ->icon('heroicon-o-clock')

        ];
    }
}
