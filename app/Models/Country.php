<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'season'];

    protected $hidden = ['created_at', 'updated_at'];

    public function hotels()
    {
        return $this->hasMany('App\Models\Hotel');
    }
}
