<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'path',
        'image_type',
        'image_id'
    ];
    public function userImage()
    {
        return $this->morphTo();
    }
    public function employeeImage()
    {
        return $this->morphTo();
    }
}
