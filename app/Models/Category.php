<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'enabled',
    ];

    public function thumbnail()
    {
        return $this->hasMany(Thumbnail::class);
    }
}
