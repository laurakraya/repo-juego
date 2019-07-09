<?php

namespace Contrareloj;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function level() {

        return $this->belongsTo(Level::class, 'levels_id');
        
    }
}
