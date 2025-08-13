<?php

namespace App\Filament\Widgets;

use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Jumlah semua produk briket')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
            Stat::make('Total Permintaan', Inquiry::count())
                ->description('Jumlah semua permintaan masuk')
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color('warning'),
            Stat::make('Total Galeri', Gallery::count())
                ->description('Jumlah semua foto di galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->color('info'),
        ];
    }
}
