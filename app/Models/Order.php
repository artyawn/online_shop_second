<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'track_number',
        'status',
        'sum',
        'products'
    ];

    protected $casts = [
      'products' => 'array'
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setProductsAttribute($value)
    {
        $this->attributes['products'] = json_encode($value);
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Status::tryFrom($value)->value,
        );
    }
}
