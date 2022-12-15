<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'content'];
    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre');
    }
}
