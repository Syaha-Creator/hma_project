<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['background_image', 'logo_image', 'menu_navigation'];

    protected $casts = [
        'menu_navigation' => 'array',
    ];
}
