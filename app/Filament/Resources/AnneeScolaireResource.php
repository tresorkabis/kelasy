<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnneeScolaireResource\Pages;
use App\Filament\Resources\AnneeScolaireResource\RelationManagers;
use App\Models\AnneeScolaire;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnneeScolaireResource extends Resource
{
    protected static ?string $model = AnneeScolaire::class;

    protected static ?string $navigationLabel = "Année Scolaire";

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titre')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Crée')
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAnneeScolaires::route('/'),
            'create' => Pages\CreateAnneeScolaire::route('/create'),
            'view' => Pages\ViewAnneeScolaire::route('/{record}'),
            'edit' => Pages\EditAnneeScolaire::route('/{record}/edit'),
        ];
    }
}
