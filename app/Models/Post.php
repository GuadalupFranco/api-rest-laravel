<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::limit($this->content, 120, '...')
        );
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->diffForHumans()
            /* $this->created_at->format('d/m/y h:s:m') */
        );
    }
    
}
