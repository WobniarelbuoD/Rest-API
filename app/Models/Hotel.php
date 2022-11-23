<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'photo', 'length'];

    protected $hidden = ['created_at', 'updated_at', 'country_id'];

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
