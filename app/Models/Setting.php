<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public function image(){
        // One to One
        return $this->morphOne(Image::class,'imageable');
    }
}
