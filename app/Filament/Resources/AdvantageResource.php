<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvantageResource\Pages;
use App\Models\Advantage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdvantageResource extends Resource
{
    protected static ?string $model = Advantage::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Bahasa')
                    ->tabs([
                        // Tab Bahasa Indonesia
                        Forms\Components\Tabs\Tab::make('Bahasa Indonesia')
                            ->schema([
                                Forms\Components\TextInput::make('judul_id')
                                    ->label('Judul')
                                    ->required(),
                                Forms\Components\Textarea::make('deskripsi_id')
                                    ->label('Deskripsi')
                                    ->required(),
                            ]),
                            
                        // Tab English
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Title')
                                    ->nullable(),
                                Forms\Components\Textarea::make('description_en')
                                    ->label('Description')
                                    ->nullable(),
                            ]),
                    ])->columnSpanFull(),

                Forms\Components\TextInput::make('icon')
                    ->label('Nama Ikon (SVG atau Heroicon)')
                    ->nullable(),
                Forms\Components\FileUpload::make('image_path')
                    ->label('Gambar')
                    ->directory('advantages')
                    ->image()
                    ->imageEditor()
                    ->nullable(),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul_id')
                    ->label('Judul (ID)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_en')
                    ->label('Title (EN)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ikon')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
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
            'index' => Pages\ListAdvantages::route('/'),
            'create' => Pages\CreateAdvantage::route('/create'),
            'edit' => Pages\EditAdvantage::route('/{record}/edit'),
        ];
    }
}

