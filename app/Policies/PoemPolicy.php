<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Poem;
use App\Models\User;

class PoemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function owner(User $user, Poem $poem)
    {
        if($poem->authorable_type === Author::class){
            return false;
        }
        return $user->id === $poem->author_id;
    }
}
