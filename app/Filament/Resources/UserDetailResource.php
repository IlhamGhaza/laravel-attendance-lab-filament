<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserDetailResource\Pages;
use App\Filament\Resources\UserDetailResource\RelationManagers;
use App\Models\UserDetail;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserDetailResource extends Resource
{
    protected static ?string $model = UserDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'User Manajement';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->image()
                    ->disk('public'),
                DatePicker::make('date_of_birth')
                    ->date()
                    ->native(false)
                    ->required(),
                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->maxLength(255),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                    ->required(),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('first_name')
                    ->toggleable()->searchable()->sortable(),
                TextColumn::make('last_name')
                    ->toggleable()->searchable()->sortable(),
                ImageColumn::make('image')
                    ->rounded()->disk('public')->size(50),
                TextColumn::make('date_of_birth')
                    ->dateTime()->toggleable()->searchable()->sortable(),
                TextColumn::make('user.email')
                        ->toggleable()->searchable()->sortable(),
                TextColumn::make('phone')
                    ->toggleable()->searchable()->sortable(),
                TextColumn::make('gender')
                    ->toggleable()->searchable()->sortable(),
                TextColumn::make('address')
                    ->toggleable()->searchable()->sortable(),
                TextColumn::make('position')
                    ->toggleable()->searchable()->sortable()
                    ->badge()
                    ->color(function (string $state): string{
                        return match($state){
                            'assistant' => '#4CAF50', // Green
                            'tutor' => '#2196F3',     // Blue
                            'ketua' => '#FFC107',     // Amber
                            'staff' => '#F44336'
                        };
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteBulkAction::make()
                ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Success')
                            ->body('Data deleted successfully')
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
            'index' => Pages\ListUserDetails::route('/'),
            'create' => Pages\CreateUserDetail::route('/create'),
            'edit' => Pages\EditUserDetail::route('/{record}/edit'),
        ];
    }
}
