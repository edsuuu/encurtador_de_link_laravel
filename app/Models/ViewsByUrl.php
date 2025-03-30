<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewsByUrl extends Model
{
    protected $table = 'views_short_url';
    protected $fillable = [
        'shortner_link_id',
        'ip_address',
    ];
}
