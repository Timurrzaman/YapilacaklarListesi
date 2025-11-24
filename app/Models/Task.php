<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Bu satırı ekleyin

class Task extends Model
{
    use HasFactory;

    /**
     * Toplu atama ile doldurulabilir alanlar.
     */
    protected $fillable = [
        'title',
        'due_at',
    ];

    /**
     * Görevin ait olduğu kullanıcıyı tanımlayan ilişki.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

