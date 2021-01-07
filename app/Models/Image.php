<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url'
    ];

    /**
     * @return MorphTo
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute($value)
    {
        return Storage::disk('public')->url($value);
    }
}
