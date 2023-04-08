<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function permissions(){
        return $this->belongsToMany(Permission::class,'roles_permission');
    }

    public function hasAnyPermission($permissions){
        if(is_array($permissions)){
            foreach($permissions as $permission){
                if($this->hasPermission($permission)){
                    return true;
                }
            }
        }else
        {
            if($this->hasPermission($permissions)){
                return true;
            }
        }

        return false;
    }

    public function hasPermission($permission){
        if($this->permissions()->where('name',$permission)->first()){
            return true;
        }
        return false;
    }
}
