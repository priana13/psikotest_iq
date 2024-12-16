<?php

namespace App\Filament\Resources\KunciNormaResource\Pages;

use App\Filament\Resources\KunciNormaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKunciNorma extends EditRecord
{
    protected static string $resource = KunciNormaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
