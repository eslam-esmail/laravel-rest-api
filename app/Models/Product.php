<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reduceStock(int $quantity): void
    {
        if ($this->stock < $quantity) {
            throw new \Exception('Out of stock for: ' . $this->name);
        }

        $this->stock -= $quantity;
        $this->save();
    }
}
