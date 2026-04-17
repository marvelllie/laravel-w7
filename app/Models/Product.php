<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Tambahkan ini

class Product extends Model
{
    use SoftDeletes; // 2. Tambahkan ini di dalam class

    public function product_category():BelongsTo{
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}