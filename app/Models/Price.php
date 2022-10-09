<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// TODO: Deze model veranderen naar stock?
class Price extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'price'
    ];

    public function supermarket(): BelongsTo
    {
        return $this->belongsTo(Supermarket::class);
    }
}
