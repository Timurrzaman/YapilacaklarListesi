<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Bu satırı ekleyin

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Toplu atama ile doldurulabilir alanlar.
     */
    protected $fillable = [
        'kullanici_adi',
        'email',
        'password',
        'cinsiyet',
        'dogum_tarihi',
        'ulke',
    ];

    /**
     * JSON'a dönüştürülürken gizlenecek alanlar.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Tür dönüşümü yapılması gereken alanlar.
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Kullanıcının sahip olduğu görevleri tanımlayan ilişki.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}

