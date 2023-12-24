<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['product_name','product_desc','product_image','prod_price','prod_stock','category_id','brand_id'];

    public function brands() :BelongsTo
    {
        return $this->belongsTo(Brands::class,'brand_id');
    }
    public function categories() :BelongsTo
    {
        return $this->belongsTo(Categories::class,'category_id');
    }
}
