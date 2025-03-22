<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TuteurResource\Pages;
use App\Filament\Resources\TuteurResource\RelationManagers;
use App\Models\Tuteur;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TuteurResource extends Resource
{
    protected static ?string $model = Tuteur::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom'),
                TextInput::make('postnom'),
                TextInput::make('prenom')
                    ->label('Prénom'),
                TextInput::make('telephone'),
                TextInput::make('degre'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom'),
                TextColumn::make('postnom'),
                TextColumn::make('prenom'),
                TextColumn::make('telephone'),
                TextColumn::make('degre'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->label('Crée'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTuteurs::route('/'),
            'create' => Pages\CreateTuteur::route('/create'),
            'view' => Pages\ViewTuteur::route('/{record}'),
            'edit' => Pages\EditTuteur::route('/{record}/edit'),
        ];
    }
}
