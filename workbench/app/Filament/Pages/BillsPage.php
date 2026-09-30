<?php

namespace Workbench\App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class BillsPage extends Page
{
    protected string $view = 'workbench::bills-page';

    protected static ?string $navigationLabel = 'Bills & Transfers';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $title = 'Bills';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('frostedModal')
                ->label('Open Frosted Modal')
                ->icon('heroicon-o-sparkles')
                ->color('primary')
                ->modalHeading('Liquid Glass Frosted Modal')
                ->modalDescription('Notice the ultra-sleek translucent glass backdrop, ambient blur, and specular border reflections.')
                ->form([
                    TextInput::make('recipient')
                        ->label('Recipient')
                        ->placeholder('e.g. Mobbin Pte. Ltd.')
                        ->default('Mobbin Pte. Ltd.'),
                    TextInput::make('amount')
                        ->label('Amount ($)')
                        ->prefix('$')
                        ->default('120.00'),
                    Select::make('category')
                        ->label('Category')
                        ->options([
                            'software' => 'Software & Subscriptions',
                            'payroll' => 'Payroll & Contractors',
                            'operations' => 'Business Operations',
                        ])
                        ->default('software'),
                ])
                ->action(function () {
                    Notification::make()
                        ->title('Transfer Scheduled')
                        ->body('Frosted modal action executed successfully!')
                        ->success()
                        ->send();
                }),

            Action::make('slideOver')
                ->label('Open Slide-over Drawer')
                ->icon('heroicon-o-bars-3-bottom-right')
                ->color('gray')
                ->slideOver()
                ->modalHeading('$5.00 Bill Details')
                ->modalDescription('Revolut Business style slide-over drawer with high-blur frosted glass.')
                ->form([
                    TextInput::make('bill_id')
                        ->label('Bill Reference')
                        ->default('INV-2026-0941')
                        ->disabled(),
                    TextInput::make('to')
                        ->label('To')
                        ->default('Mobbin Pte. Ltd.')
                        ->disabled(),
                    TextInput::make('due_date')
                        ->label('Due Date')
                        ->default('Nov 25, 2026')
                        ->disabled(),
                    TextInput::make('status')
                        ->label('Status')
                        ->default('Ready to pay')
                        ->disabled(),
                ])
                ->action(function () {
                    Notification::make()
                        ->title('Bill Paid')
                        ->body('Payment initiated from slide-over drawer.')
                        ->success()
                        ->send();
                }),

            ActionGroup::make([
                Action::make('exportCsv')
                    ->label('Download CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(fn () => Notification::make()->title('Exporting CSV')->info()->send()),
                Action::make('settings')
                    ->label('Settings')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->action(fn () => Notification::make()->title('Settings opened')->send()),
                Action::make('archive')
                    ->label('Archive Selected')
                    ->icon('heroicon-o-archive-box')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Archive Bills?')
                    ->action(fn () => Notification::make()->title('Archived')->warning()->send()),
            ])
            ->label('More Actions')
            ->icon('heroicon-o-ellipsis-horizontal')
            ->color('gray'),
        ];
    }
}
