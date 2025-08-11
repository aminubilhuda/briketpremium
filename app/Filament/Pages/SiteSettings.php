<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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
                        TextInput::make('company_address')->label('Alamat Perusahaan')->required(),
                        TextInput::make('whatsapp_number')->label('Nomor WhatsApp')->required(),
                    ]),
                Section::make('Konten & Media')
                    ->description('URL untuk konten eksternal.')
                    ->schema([
                        TextInput::make('youtube_video_url')->label('URL Video Youtube (Hero)')->url(),
                    ]),
                Section::make('Sosial Media')
                    ->description('Tautan ke akun sosial media perusahaan.')
                    ->schema([
                        TextInput::make('facebook_url')->label('URL Facebook')->url(),
                        TextInput::make('instagram_url')->label('URL Instagram')->url(),
                        TextInput::make('linkedin_url')->label('URL LinkedIn')->url(),
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
