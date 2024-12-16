<?php

namespace App\Filament\Resources\KunciNormaResource\Pages;

use App\Filament\Resources\KunciNormaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKunciNorma extends CreateRecord
{
    protected static string $resource = KunciNormaResource::class;

    protected function afterCreate(): void
    {
       $record = $this->record;

       $tipe_usia = KunciNormalize::getTipeUsia($record->usia);    

       $record->tipe_usia = $tipe_usia;
       
       $record->save();
    }


}
