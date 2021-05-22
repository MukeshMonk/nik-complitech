<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $guarded = ['id'];

    public function father()
    {
        return $this->belongsToMany(User::class, 'father', 'child_id', 'parent_id');
    }

    public function fatherDetails() 
    {
        return $this->father()->first();
    }

    public function mother()
    {
        return $this->belongsToMany(User::class, 'mother', 'child_id', 'parent_id');
    }

    public function motherDetails() 
    {
        return $this->mother()->first();
    }

    public function childOfFather()
    {
        return $this->belongsToMany(User::class, 'father', 'parent_id', 'child_id');
    }

    public function childOfMother()
    {
        return $this->belongsToMany(User::class, 'mother', 'parent_id', 'child_id');
    }

    public function childDetails() 
    {
        return $this->childOfFather->merge($this->childOfMother);
    }
}
