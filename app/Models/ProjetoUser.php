<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjetoUser extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'projeto_id',
        'user_id',
    ];

    public function projeto(): BelongsTo{
        return $this->belongsTo(Projeto::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
