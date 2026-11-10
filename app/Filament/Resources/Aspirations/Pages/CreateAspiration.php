<?php

namespace App\Filament\Resources\Aspirations\Pages;

use App\Filament\Resources\Aspirations\AspirationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAspiration extends CreateRecord
{
    protected static string $resource = AspirationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['status'] = 'Menunggu';

        return $data;
    }
}
