<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\KunciNorma;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KunciNormaResource\Pages;
use App\Filament\Resources\KunciNormaResource\RelationManagers;

class KunciNormaResource extends Resource
{
    protected static ?string $model = KunciNorma::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('tipe_usia')
                //     ->required()
                //     ->options([
                //         "A" => "A",
                //         "B" => "B",
                //         "C" => "C",
                //         "D" => "D",
                //         "E" => "E",
                //         "F" => "F",
                //         "G" => "G",
                //         "H" => "H",
                //         "I" => "I",
                //         "J" => "J",
                //         "K" => "K",
                //         "L" => "L",
                //         "M" => "M",
                //     ]),
                Forms\Components\TextInput::make('usia')->required()->numeric(),
                Forms\Components\TextInput::make('rw')->required(),
                Forms\Components\TextInput::make('se'),
                Forms\Components\TextInput::make('wa'),
                Forms\Components\TextInput::make('an'),
                Forms\Components\TextInput::make('ge'),
                Forms\Components\TextInput::make('ra'),
                Forms\Components\TextInput::make('zr'),
                Forms\Components\TextInput::make('fa'),
                Forms\Components\TextInput::make('wu'),
                Forms\Components\TextInput::make('me'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipe_usia')->searchable(),
                Tables\Columns\TextColumn::make('usia'),              
                Tables\Columns\TextColumn::make('rw'),
                Tables\Columns\TextColumn::make('se'),
                Tables\Columns\TextColumn::make('wa'),
                Tables\Columns\TextColumn::make('an'),
                Tables\Columns\TextColumn::make('ge'),
                Tables\Columns\TextColumn::make('ra'),
                Tables\Columns\TextColumn::make('zr'),
                Tables\Columns\TextColumn::make('fa'),
                Tables\Columns\TextColumn::make('wu'),
                Tables\Columns\TextColumn::make('me'),
            ])
            ->filters([
                SelectFilter::make("tipe_usia")->options([
                    "A" => "A",
                    "B" => "B",
                    "C" => "C",
                    "D" => "D",
                    "E" => "E",
                    "F" => "F",
                    "G" => "G",
                    "H" => "H",
                    "I" => "I",
                    "J" => "J",
                    "K" => "K",
                    "L" => "L",
                    "M" => "M",
                ]),
                Filter::make('usia')
                ->form([
                    Forms\Components\TextInput::make('usia')->numeric(),                   
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['usia'],
                            fn (Builder $query, $usia): Builder => $query->where('usia', $usia),
                        );                    
                })

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListKunciNormas::route('/'),
            'create' => Pages\CreateKunciNorma::route('/create'),
            'edit' => Pages\EditKunciNorma::route('/{record}/edit'),
        ];
    }    
}
