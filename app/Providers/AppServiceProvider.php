<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //        Filament::registerTheme(
//            app(Vite::class)('resources/css/filament.css'),
//        );

//        Filament::serving(function () {
//            Filament::registerViteTheme('resources/css/filament.css');
//        });

Filament::registerNavigationGroups([
    'Customers',
    'Orders',
    'Products',
    'Suppliers',
    'SETTINGS',
]);

Filament::serving(function () {
    Filament::registerNavigationGroups([
        NavigationGroup::make()
            ->label('Customers')
            ->icon('heroicon-o-arrow-up'),
        NavigationGroup::make()
            ->label('Orders')
            ->icon('heroicon-o-arrow-up'),
        NavigationGroup::make()
            ->label('Products')
            ->icon('heroicon-o-arrow-up'),
        NavigationGroup::make()
            ->label('Suppliers')
            ->icon('heroicon-o-arrow-up'),
        NavigationGroup::make()
            ->label('Settings')
            ->icon('heroicon-o-arrow-up'),

    ]);
     });
    }
}
