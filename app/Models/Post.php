<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsActive(Builder $query)
    {
        $query->where('active', 1);
    }
}
