<?php

namespace App\Filament\Resources\Aspirations;

use App\Filament\Resources\Aspirations\Pages\CreateAspiration;
use App\Filament\Resources\Aspirations\Pages\EditAspiration;
use App\Filament\Resources\Aspirations\Pages\ListAspirations;
use App\Filament\Resources\Aspirations\Schemas\AspirationForm;
use App\Filament\Resources\Aspirations\Tables\AspirationsTable;
use App\Models\Aspiration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AspirationResource extends Resource
{
    protected static ?string $model = Aspiration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'location';

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (! auth()->user()->isAdmin()) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    public static function getAuthorizationResponse(string $action, ?Model $record = null): Response
    {
        if (auth()->user()->isAdmin() || in_array($action, ['viewAny', 'create'])) {
            return Response::allow();
        }

        return Response::deny();
    }

    public static function form(Schema $schema): Schema
    {
        return AspirationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AspirationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAspirations::route('/'),
            'create' => CreateAspiration::route('/create'),
            'edit' => EditAspiration::route('/{record}/edit'),
        ];
    }
}
