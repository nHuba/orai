<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class Family extends Model
{
    public function names()
    {
        return $this->hasMany('App\Models\Name');
    }
}