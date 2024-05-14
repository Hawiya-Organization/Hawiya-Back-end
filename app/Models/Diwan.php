<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diwan extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function poems(){
        return $this->hasMany(Poem::class);
    }

}
