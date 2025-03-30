<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortnerLink extends Model
{
    protected $table = 'shortner_link';

    protected $fillable = [
        'title',
        'url',
        'short_code',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(ViewsByUrl::class);
    }
}
