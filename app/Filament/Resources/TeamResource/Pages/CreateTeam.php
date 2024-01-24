<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Models\Team;
use App\Models\User;
use Filament\Actions;
use App\Traits\GenerateSlug;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    use GenerateSlug;
    protected static string $resource = TeamResource::class;

    protected function mutateFormDataBeforeCreate(
        array $data
    ): array {

        $data['slug'] = $this->generateSlug(
            $data['name'],'teams'
        );

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $this
            ->record
            ->users()
            ->attach(User::find(1));
    }
}
