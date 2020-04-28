<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemoTask extends Model
{
    protected $fillable = [
        'id', 'title','order', 'status',
    ];
}
