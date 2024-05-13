<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Models\User;

use Illuminate\Http\Request;


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


}
