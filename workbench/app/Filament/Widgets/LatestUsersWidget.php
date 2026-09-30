<?php

namespace Workbench\App\Filament\Widgets;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Workbench\App\Models\User;

class LatestUsersWidget extends TableWidget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 2,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->heading('Recent Active Accounts')
            ->description('Live user registrations with interactive status toggles')
            ->query(User::query()->latest()->limit(5))
            ->paginated(false)
            ->columns([
                TextColumn::make('name')
                    ->label('User')
                    ->weight('bold')
                    ->icon('heroicon-m-user-circle'),
                TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-m-envelope'),
                ToggleColumn::make('is_active')
                    ->label('Status'),
                IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Registered')
                    ->dateTime('M d, H:i'),
            ]);
    }
}
