<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bio'];


    public function poems()
    {
        return $this->morphMany(Poem::class, 'authorable');
    }
    public function bayts()
    {
        return $this->hasManyThrough(Bayt::class, Poem::class);
    }

}
