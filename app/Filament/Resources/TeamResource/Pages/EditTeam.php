<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Models\Team;
use Filament\Actions;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function(
                    Actions\DeleteAction $action, Team $record
                ) {
                    $this->getResource()::checkTeamIsDeleteable($record->id, fn() => $action->cancel());
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
