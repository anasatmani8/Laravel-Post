<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titel', 'body', 'image', 'slug','user_id'];
    
    public function getRouteKeyName()   // to work without showing the id 
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
