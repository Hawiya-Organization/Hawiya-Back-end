<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayt extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'poem_id','id'];

    public function poem(){
        return $this->belongsTo(Poem::class);
    }


}
