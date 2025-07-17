<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'feedback'; // Pastikan nama tabel sesuai dengan database
    protected $fillable = ['user_id', 'name', 'feedback'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

