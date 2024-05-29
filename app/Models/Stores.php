<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stores extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'destination_url',
        'category',
        'meta_tag',
        'meta_keyword',
        'meta_description',
        'status',
        'authentication',
        'network',
        'store_image',
    ];

    public function category()
    {
        return $this->hasMany(Categories::class, 'id');
    }
 
        public function coupon()
        {
            return $this->hasMany(Coupons::class);
        }

    
}
