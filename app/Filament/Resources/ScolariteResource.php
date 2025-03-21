<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScolariteResource\Pages;
use App\Filament\Resources\ScolariteResource\RelationManagers;
use App\Models\Scolarite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScolariteResource extends Resource
{
    protected static ?string $model = Scolarite::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            'index' => Pages\ListScolarites::route('/'),
            'create' => Pages\CreateScolarite::route('/create'),
            'view' => Pages\ViewScolarite::route('/{record}'),
            'edit' => Pages\EditScolarite::route('/{record}/edit'),
        ];
    }
}
