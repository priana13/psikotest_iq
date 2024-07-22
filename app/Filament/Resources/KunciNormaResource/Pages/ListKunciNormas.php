<?php

namespace App\Filament\Resources\KunciNormaResource\Pages;

use App\Filament\Resources\KunciNormaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKunciNormas extends ListRecords
{
    protected static string $resource = KunciNormaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
