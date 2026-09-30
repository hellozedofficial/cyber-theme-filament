<?php

namespace Workbench\App\Providers\Filament;

use CyberGlass\CyberGlassPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use LiquidGlass\LiquidGlassPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->sidebarCollapsibleOnDesktop()
            ->sidebarFullyCollapsibleOnDesktop()
            ->profile()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->globalSearchFieldKeyBindingSuffix()
            ->resources([
                \Workbench\App\Filament\Resources\Users\UserResource::class,
            ])
            ->pages([
                \Workbench\App\Filament\Pages\Dashboard::class,
                \Workbench\App\Filament\Pages\BillsPage::class,
            ])
            ->widgets([
                \Workbench\App\Filament\Widgets\StatsOverviewWidget::class,
                \Workbench\App\Filament\Widgets\RevenueChartWidget::class,
                \Workbench\App\Filament\Widgets\DeviceBreakdownChartWidget::class,
                \Workbench\App\Filament\Widgets\CategorySalesChartWidget::class,
                \Workbench\App\Filament\Widgets\LatestUsersWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(
                CyberGlassPlugin::make()
                    ->blur('6px')
                    ->fadedHeader(true, '12px')
                    ->modalBlur('4px')
                    ->slideOverBlur('6px')
                    ->dropdownBlur('6px')
            );
    }
}
