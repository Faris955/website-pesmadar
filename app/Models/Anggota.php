<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    //
    use HasFactory;

    // Properti ini WAJIB ada untuk keamanan
    protected $fillable = [
        'nama_lengkap',
        'email',
        'telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'kampus',
        'alamat',
        'asal_daerah',
        'path_foto',
        'path_ktm',
        'path_krs',
        'path_ktp',
        'status'

        // 'status_verifikasi', // uncomment jika Anda menambahkannya di migrasi
    ];
}
