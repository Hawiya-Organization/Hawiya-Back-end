<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kafiya extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function poems()
    {
        return $this->hasMany(Poem::class);
    }
}
