<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_id',
        'title',
        'slug',
        'description',
        'square_feet',
        'selling_price',
        'purpose',
        'bedrooms',
        'bathrooms',
        'address',
        'featured',
        'city',
        'image',
        'ad_id',
        'user_id'
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );
    }


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }


}
