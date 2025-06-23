<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Models\Anggota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Label;
use Filament\Actions\Action;

class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationLabel(): string
    {
        return 'Daftar Anggota'; // Ini yang muncul di sidebar kiri
    }
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user-group';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pribadi')
                    ->schema([
                        TextInput::make('email')->email()->required(),
                        TextInput::make('telepon')->required(),
                        DatePicker::make('tanggal_lahir')->required(),
                        Select::make('jenis_kelamin')
                            ->options([
                                'male' => 'Laki-laki',
                                'female' => 'Perempuan',
                            ])->required(),
                        TextInput::make('kampus')->required(),
                        TextInput::make('alamat')->required(),
                        TextInput::make('asal_daerah')->required(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Belum Diverifikasi',
                                'verified' => 'Terverifikasi',
                            ])
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Berkas Anggota')
                    ->schema([
                        FileUpload::make('path_foto')->image()
                            ->label('Foto Anggota')
                            ->required()
                            ->directory('dokumen/foto')
                            ->openable(),
                        FileUpload::make('path_ktm')->image()
                            ->Label('KTM Anggota')
                            ->required()
                            ->directory('dokumen/ktm')
                            ->openable(),
                        FileUpload::make('path_krs')->image()
                            ->label('KRS Anggota')
                            ->required()
                            ->directory('dokumen/krs')
                            ->openable(),
                        FileUpload::make('path_ktp')->image()
                            ->label('KTP Anggota')
                            ->required()
                            ->directory('dokumen/ktp')
                            ->openable(),
                    ])
                    ->columns(2),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama_lengkap')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('telepon'),
                TextColumn::make('kampus'),
                TextColumn::make('status'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'view' => Pages\ViewAnggota::route('/{record}'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
