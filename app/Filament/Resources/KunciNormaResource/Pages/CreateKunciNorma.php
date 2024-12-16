<?php

namespace App\Filament\Resources\KunciNormaResource\Pages;

use App\Models\KunciNorma;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\KunciNormaResource;

class CreateKunciNorma extends CreateRecord
{
    protected static string $resource = KunciNormaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
       $record = $this->record;

       $tipe_usia = KunciNorma::getTipeUsia($record->usia);    

       $record->tipe_usia = $tipe_usia;

       $record->save();
    }


}
