<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'ad_id',
    ];

    public function ads(){
        return $this->belongsTo(Ad::class);
    }
}
