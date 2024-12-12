<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupons extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
        'destination_url',
        'ending_date',
        'status',
        'clicks',
        'authentication',
        'store',
        'order',
        'language_id',
    ];

 public function store(): BelongsTo
    {
        return $this->belongsTo(Stores::class);
    }
 /**
  * Get the user that owns the Coupons
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function language(): BelongsTo
 {
     return $this->belongsTo(Language::class, 'language_id', );
 }
    
}
