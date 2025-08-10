<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Media')
                    ->schema([
                        Forms\Components\TextInput::make('title')->label('Judul'),
                        Forms\Components\Textarea::make('description')->label('Deskripsi'),
                    ]),
                Forms\Components\Section::make('File')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->label('Upload File')
                            ->required()
                            ->directory('gallery-media')
                            ->preserveFilenames()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if (!$state) return;
                                $set('file_type', str_starts_with($state->getMimeType(), 'video') ? 'video' : 'image');
                                $set('mime_type', $state->getMimeType());
                                $set('size', $state->getSize());
                            })
                            ->live(),
                        Forms\Components\Hidden::make('file_type'),
                        Forms\Components\Hidden::make('mime_type'),
                        Forms\Components\Hidden::make('size'),
                        Forms\Components\Hidden::make('uploaded_by')->default(Auth::id()),
                        Forms\Components\Hidden::make('uploaded_at')->default(now()),
                        Forms\Components\Toggle::make('is_published')->label('Publikasikan?')->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('file_path')->label('Preview')->width(100)->height(100),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable(),
                Tables\Columns\TextColumn::make('file_type')->label('Tipe')->badge(),
                Tables\Columns\ToggleColumn::make('is_published')->label('Status Publikasi'),
                Tables\Columns\TextColumn::make('order')->label('Urutan')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}