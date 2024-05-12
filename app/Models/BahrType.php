<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahrType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function poems()
    {
        return $this->hasMany(Poem::class);
    }
    public function bayts()
    {
        return $this->hasManyThrough(Bayt::class, Poem::class);
    }

}
