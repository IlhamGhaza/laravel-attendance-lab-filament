<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'User Manajement';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                Select::make('role_id')
                    ->relationship('role', 'name')
                    ->required(),
                TextInput::make('password')
                    ->required()->password()->revealable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role.name')
                    ->label('Role')
                    ->searchable()
                    ->badge()
                    ->color(function (string $state): string {
                        return match ($state) {
                            'Admin' => 'danger', //red
                            'Staff' => 'warning',
                            'User' => 'info',
                            // default => 'gray',
                        };
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
          ->actions([
                // Tables\Actions\ExportAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('User Deleted')
                        ->body('User has been deleted successfully.')
                        ->success()
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
