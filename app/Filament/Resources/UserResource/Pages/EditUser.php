<?php

declare(strict_types=1);

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Tabs;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('height')
                ->statePath('height')
                ->numeric()
                ->minValue(100), // works

            Tabs::make('Heading')
                ->tabs([
                    Tabs\Tab::make('User info')
                        ->schema([
                            TextInput::make('age')
                                ->statePath('age')
                                ->numeric()
                                ->minValue(18), // todo: fixme. doesn't work
                        ]),
                ]),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
