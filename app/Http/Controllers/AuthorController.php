<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $randomAuthors=Author::inRandomOrder()->limit(10)->get();
        //$randomUsers= User::whereHas('poems')->inRandomOrder()->limit(10)->get();
        return  AuthorResource::collection( $randomAuthors);

    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }


}
