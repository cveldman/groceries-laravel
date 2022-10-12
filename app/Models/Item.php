<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $product
 */
class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product',
        'product_id'
    ];
}
