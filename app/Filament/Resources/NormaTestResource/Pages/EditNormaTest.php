<?php

namespace App\Filament\Resources\NormaTestResource\Pages;

use App\Filament\Resources\NormaTestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNormaTest extends EditRecord
{
    protected static string $resource = NormaTestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
