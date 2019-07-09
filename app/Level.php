<?php

namespace Contrareloj;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function images() {

        return $this->hasMany(Image::class, 'levels_id');
        
    }
}
