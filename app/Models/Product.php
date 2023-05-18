<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'photo'
    ];

    public function scopeFilter($query, $request)
    {
        if ($request->name) {
            $query->where('name', 'like', "%{$request->name}%");
        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
