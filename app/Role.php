<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title'];

    public function staff() {
    	return $this->hasMany(User::class, 'role_id');
    }

    public function url() {
    	return '/staff/index?role=' . $this->title;
    }
}
