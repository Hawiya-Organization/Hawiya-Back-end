<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;


    protected $with =  ['authorable','bahrType','kafiya','asr','diwan'];
    protected $fillable = ['title','id',
     'authorable_id', 'authorable_type',
     'bahr_type_id','is_hor','asr_id','kafiya_id','diwan_id'];

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

    public function kafiya(){
        return $this->belongsTo(Kafiya::class);
    }
    public function asr(){
        return $this->belongsTo(Asr::class);
    }
    public function diwan(){
        return $this->belongsTo(Diwan::class);
    }
}

