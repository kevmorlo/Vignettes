<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'audio',
        'video',
        'category_id',
        'size_id',
        'user_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function size() {
        return $this->belongsTo(Size::class);
    }
}
