<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Models\Role;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
     protected static ?string $navigationGroup = 'User Manajement';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->disabled(fn ($record) => $record && $record->name !== 'admin')
                    ->default('admin'),
                TextInput::make('description')
                    ->maxLength(255)
                    ->disabled(fn ($record) => $record && $record->name !== 'admin')
                    ->required(),
            ])
            ->disabled(fn ($record) => $record && $record->name !== 'admin');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                 Tables\Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Role Deleted')
                        ->body('The role has been deleted.')
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
