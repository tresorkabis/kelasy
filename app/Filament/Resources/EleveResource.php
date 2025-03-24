<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EleveResource\Pages;
use App\Filament\Resources\EleveResource\RelationManagers;
use App\Filament\Resources\EleveResource\RelationManagers\DocumentsRelationManager;
use App\Models\Eleve;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EleveResource extends Resource
{
    protected static ?string $model = Eleve::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations personnelles')->schema([
                    Forms\Components\TextInput::make('matricule')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nom')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('postnom')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('prenom')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('date_naissance')
                        ->required(),
                    Forms\Components\TextInput::make('lieu_naissance')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('sexe')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('telephone')
                        ->tel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('adresse')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(2)->columns(2),
                Section::make('Autres')->schema([
                    FileUpload::make('photo')
                        ->directory('photos'),
                    Forms\Components\Select::make('tuteur_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('tuteur', 'nom'),
                    Forms\Components\Select::make('classe_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('classe', 'nom'),
                    Forms\Components\Select::make('section_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('section', 'nom'),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo'),
                Tables\Columns\TextColumn::make('matricule')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postnom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prenom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexe')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('classe.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tuteur.nom')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            DocumentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEleves::route('/'),
            'create' => Pages\CreateEleve::route('/create'),
            'view' => Pages\ViewEleve::route('/{record}'),
            'edit' => Pages\EditEleve::route('/{record}/edit'),
        ];
    }
}
