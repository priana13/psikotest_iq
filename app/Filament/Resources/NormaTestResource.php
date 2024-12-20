<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\NormaTest;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NormaTestResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NormaTestResource\RelationManagers;

class NormaTestResource extends Resource
{
    protected static ?string $model = NormaTest::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\TextInput::make('test_id')
                    ->required(),
                Forms\Components\TextInput::make('quiz_id'),
                Forms\Components\TextInput::make('k')
                    ->maxLength(191),
                Forms\Components\TextInput::make('j')
                    ->maxLength(191),
                Forms\Components\TextInput::make('nilai')
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table           
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->searchable()->label("Nama"),
                Tables\Columns\TextColumn::make('user.email')->searchable()->label("Email"),
                Tables\Columns\TextColumn::make('norma.nama'),
                Tables\Columns\TextColumn::make('quiz_id'),
                Tables\Columns\TextColumn::make('k'),
                Tables\Columns\TextColumn::make('j'),
                Tables\Columns\BadgeColumn::make('nilai')->formatStateUsing(function($state){

                    return ($state > 0)? 'Benar' : 'Salah';
                }),
                Tables\Columns\TextColumn::make('created_at')->label("Tanggal")
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('user_id')->relationship('user' , 'name')->searchable()->label("Peserta"),
                SelectFilter::make('test_id')->relationship('norma' , 'nama')->searchable(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNormaTests::route('/'),
            'create' => Pages\CreateNormaTest::route('/create'),
            'edit' => Pages\EditNormaTest::route('/{record}/edit'),
        ];
    }    


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('id' , 'desc');
    }

}
