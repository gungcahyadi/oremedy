<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    protected $table = 'web_config';
    protected $fillable = [
        'config_name', 'value',
    ];
}
