<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;


    protected $with =  ['authorable','bahrType'];
    protected $fillable = ['title',  'authorable_id', 'authorable_type','bahr_type_id','is_hor'];

    // either author or user can be the author of the poem
    public function authorable()
    {
        return $this->morphTo("authorable");
    }


    public function bahrType()
    {
        return $this->belongsTo(BahrType::class);
    }
    public function bayts()
    {
        return $this->hasMany(Bayt::class);
    }
}

