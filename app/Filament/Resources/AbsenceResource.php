<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsenceResource\Pages;
use App\Models\Absence;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AbsenceResource extends Resource
{
    protected static ?string $model = Absence::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?string $navigationGroup = 'Attendace Manajement';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                 Tables\Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Absence deleted')
                        ->body('Absence deleted successfully')
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
            'index' => Pages\ListAbsences::route('/'),
            'create' => Pages\CreateAbsence::route('/create'),
            'edit' => Pages\EditAbsence::route('/{record}/edit'),
        ];
    }
}
