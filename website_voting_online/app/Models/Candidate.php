<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'candidates';

    // Kolom yang bisa diisi melalui form
protected $fillable = [
    'ketua',
    'calon_ketua',
    'latar_belakang_ketua',  // Latar belakang Ketua
    'visi_ketua',            // Visi Ketua
    'misi_ketua',            // Misi Ketua
    'wakil_ketua',
    'calon_wakil_ketua',
    'latar_belakang_wakil_ketua',  // Latar belakang Wakil Ketua
    'visi_wakil_ketua',           // Visi Wakil Ketua
    'misi_wakil_ketua',           // Misi Wakil Ketua
    'profile_image_ketua',
    'profile_image_wakil_ketua',
];


    // Timestamps aktif
    public $timestamps = true;
}
