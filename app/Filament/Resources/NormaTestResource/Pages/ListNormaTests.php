<?php

namespace App\Filament\Resources\NormaTestResource\Pages;

use App\Filament\Resources\NormaTestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNormaTests extends ListRecords
{
    protected static string $resource = NormaTestResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
