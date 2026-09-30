<?php

use CyberGlass\CyberGlassPlugin;
use Filament\Facades\Filament;
use Workbench\App\Models\User;

it('loads the admin login page', function () {
    $this->get('/admin/login')
        ->assertSuccessful();
});

it('has cyber glass plugin registered in the filament admin panel', function () {
    $panel = Filament::getPanel('admin');

    expect($panel->hasPlugin('filament-cyber-glass'))->toBeTrue();

    $plugin = $panel->getPlugin('filament-cyber-glass');
    expect($plugin)->toBeInstanceOf(CyberGlassPlugin::class)
        ->and($plugin->getBlur())->toBe('6px');
});

it('allows authenticated user to view the admin dashboard with widgets', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin')
        ->assertSuccessful()
        ->assertSeeLivewire(\Workbench\App\Filament\Widgets\StatsOverviewWidget::class)
        ->assertSeeLivewire(\Workbench\App\Filament\Widgets\RevenueChartWidget::class)
        ->assertSeeLivewire(\Workbench\App\Filament\Widgets\DeviceBreakdownChartWidget::class)
        ->assertSeeLivewire(\Workbench\App\Filament\Widgets\CategorySalesChartWidget::class)
        ->assertSeeLivewire(\Workbench\App\Filament\Widgets\LatestUsersWidget::class);
});

it('allows authenticated user to view the users resource page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/users')
        ->assertSuccessful();
});

it('has global search bar enabled in the header', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/users')
        ->assertSuccessful()
        ->assertSeeLivewire(\Filament\Livewire\GlobalSearch::class);
});
