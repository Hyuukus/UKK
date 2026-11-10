<?php

namespace App\Filament\Resources\Aspirations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AspirationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
