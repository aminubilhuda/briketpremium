<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Tabs::make('Bahasa')
                            ->tabs([
                                // Tab Bahasa Indonesia
                                Forms\Components\Tabs\Tab::make('Bahasa Indonesia')
                                    ->schema([
                                        Forms\Components\Section::make('Informasi Utama')
                                            ->schema([
                                                Forms\Components\TextInput::make('nama_id')
                                                    ->label('Nama Produk')
                                                    ->required()
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                                Forms\Components\TextInput::make('slug')
                                                    ->required()
                                                    ->unique(Product::class, 'slug', ignoreRecord: true)
                                                    ->disabled()
                                                    ->dehydrated(),

                                                Forms\Components\RichEditor::make('deskripsi_id')
                                                    ->label('Deskripsi')
                                                    ->required()
                                                    ->columnSpanFull(),
                                            ])->columns(2),

                                        Forms\Components\Section::make('Spesifikasi Teknis')
                                            ->schema([
                                                Forms\Components\TextInput::make('nilai_kalori')
                                                    ->label('Nilai Kalori')
                                                    ->required()
                                                    ->numeric()
                                                    ->suffix('kcal/kg'),
                                                Forms\Components\TextInput::make('kandungan_abu')
                                                    ->label('Kandungan Abu')
                                                    ->required()
                                                    ->numeric()
                                                    ->suffix('%'),
                                                Forms\Components\TextInput::make('kelembaban')
                                                    ->required()
                                                    ->numeric()
                                                    ->suffix('%'),
                                                Forms\Components\TextInput::make('karbon_tetap')
                                                    ->label('Karbon Tetap')
                                                    ->required()
                                                    ->numeric()
                                                    ->suffix('%'),
                                                Forms\Components\TextInput::make('waktu_bakar')
                                                    ->required()
                                                    ->numeric()
                                                    ->suffix('menit'),
                                                Forms\Components\TextInput::make('dimensi')
                                                    ->required()
                                                    ->label('Dimensi (P x L x T)'),
                                            ])->columns(2),
                                    ]),

                                // Tab English
                                Forms\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        Forms\Components\Section::make('Main Information')
                                            ->schema([
                                                Forms\Components\TextInput::make('name_en')
                                                    ->label('Product Name')
                                                    ->nullable(),

                                                Forms\Components\RichEditor::make('description_en')
                                                    ->label('Description')
                                                    ->nullable()
                                                    ->columnSpanFull(),
                                            ])->columns(2),

                                        Forms\Components\Section::make('Technical Specifications')
                                            ->schema([
                                                Forms\Components\TextInput::make('calorific_value_en')
                                                    ->label('Calorific Value')
                                                    ->nullable()
                                                    ->numeric()
                                                    ->suffix('kcal/kg'),
                                                Forms\Components\TextInput::make('ash_content_en')
                                                    ->label('Ash Content')
                                                    ->nullable()
                                                    ->numeric()
                                                    ->suffix('%'),
                                                Forms\Components\TextInput::make('moisture_en')
                                                    ->nullable()
                                                    ->numeric()
                                                    ->suffix('%'),
                                                Forms\Components\TextInput::make('fixed_carbon_en')
                                                    ->label('Fixed Carbon')
                                                    ->nullable()
                                                    ->numeric()
                                                    ->suffix('%'),
                                                Forms\Components\TextInput::make('burning_time_en')
                                                    ->label('Burning Time')
                                                    ->nullable()
                                                    ->numeric()
                                                    ->suffix('minutes'),
                                                Forms\Components\TextInput::make('dimensions_en')
                                                    ->nullable()
                                                    ->label('Dimensions (L x W x H)'),
                                            ])->columns(2),
                                    ]),
                            ])->columnSpanFull(),
                    ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Gambar & Status')
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->image()
                                    ->directory('product-images')
                                    ->required(),

                                Forms\Components\Toggle::make('is_featured')
                                    ->required()
                                    ->label('Jadikan produk unggulan?'),
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')->label('Gambar'),
                Tables\Columns\TextColumn::make('nama_id')
                    ->label('Nama Produk (ID)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Product Name (EN)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('nilai_kalori')
                    ->label('Nilai Kalori')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kandungan_abu')
                    ->label('Kandungan Abu')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('waktu_bakar')
                    ->label('Waktu Bakar')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}