<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $guarded = [
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
