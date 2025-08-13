<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Pengaturan Situs';
    protected static string $view = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Umum')
                    ->description('Pengaturan dasar untuk situs Anda.')
                    ->schema([
                        TextInput::make('site_name')->label('Nama Situs')->required(),
                        FileUpload::make('site_logo_path')
                            ->label('Logo Situs (akan menggantikan Nama Situs di header)')
                            ->image()
                            ->directory('site-logos'),
                        FileUpload::make('favicon_path')
                            ->label('Favicon')
                            ->image()
                            ->directory('site-favicons'),
                        TextInput::make('company_address')->label('Alamat Perusahaan')->required(),
                        TextInput::make('whatsapp_number')->label('Nomor WhatsApp')->required(),
                        TextInput::make('company_email')->label('Email Perusahaan')->email()->required(),
                    ]),
                Section::make('Konten & Media')
                    ->description('URL untuk konten eksternal.')
                    ->schema([
                        TextInput::make('hero_title')->label('Judul Hero')->required(),
                        TextInput::make('hero_subtitle')->label('Subjudul Hero')->required(),
                        FileUpload::make('hero_background_image_path')
                            ->label('Gambar Latar Belakang Hero')
                            ->image()
                            ->directory('hero-images'),
                        Textarea::make('youtube_video_embed_code')
                            ->label('Kode Embed Video Youtube')
                            ->columnSpanFull(),
                        Textarea::make('google_maps_embed_code')
                            ->label('Kode Embed Google Maps')
                            ->columnSpanFull(),
                    ]),
                Section::make('Sosial Media')
                    ->description('Tautan ke akun sosial media perusahaan.')
                    ->schema([
                        TextInput::make('facebook_url')->label('URL Facebook')->url(),
                        TextInput::make('instagram_url')->label('URL Instagram')->url(),
                        TextInput::make('linkedin_url')->label('URL LinkedIn')->url(),
                        TextInput::make('tiktok_url')->label('URL TikTok')->url(),
                        TextInput::make('x_url')->label('URL X')->url(),
                    ]),
                Section::make('E-commerce')
                    ->description('Tautan ke toko e-commerce perusahaan.')
                    ->schema([
                        TextInput::make('shopee_url')->label('URL Shopee')->url(),
                        TextInput::make('tokopedia_url')->label('URL Tokopedia')->url(),
                        TextInput::make('other_ecommerce_url')->label('URL E-commerce Lain')->url(),
                    ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        
        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}
