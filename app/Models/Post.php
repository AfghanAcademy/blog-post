<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','sub_title','description','slug','lang','profile_id'];


    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function topics(){
        return $this->belongsToMany(Topic::class,'posts_topics');
    }

    public function images(){
        // One to Many
        return $this->morphMany(Image::class,'imageable');
    }


}
