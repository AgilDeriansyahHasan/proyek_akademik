<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $table = 'votings'; // Jika nama tabel berbeda dari default Laravel

    protected $fillable = ['name', 'npm', 'email', 'candidate', 'user_id'];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
