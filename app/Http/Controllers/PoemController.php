<?php

namespace App\Http\Controllers;

use App\Http\Resources\PoemResource;
use App\Models\Bayt;
use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;


class PoemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return  PoemResource::collection( Poem::paginate());

    }



    public function store(Request $request)
    {
        /**
         * @var User $user
         */
        $user = request()->user();
        $data = $request->validate([
            'title' => 'required|string',
            'bahr_type_id' => 'required|exists:bahr_types,id',
            'is_hor' => 'required|boolean',
            'bayts' => 'required|array',
            'bayts.*.bayt_type' => 'required|integer|min:1|max:3',
            'bayts.*.content' => 'required|string',
            'bayts.*.number' => 'required|integer'// the line number
        ]);
        if ($data['is_hor'] ) {
            // for the hor poem only one bayt is allowed(standlalone ttpe)
            $request->validate([
                'bayts.*.bayt_type' => 'integer|min:3|max:3'
            ]);
            // the number shold be unique in the request for the case of the hor type
            $request->validate([
                'bayts.*.number' => 'distinct'
            ]);

        }
        $poem = $user->poems()->create($data);

        $poem->bayts()->createMany($data['bayts']);
        $poem->load('bayts');
        return new PoemResource($poem);
    }


    public function show(Poem $poem)
    {
        $poem->load('bayts');
        return new PoemResource($poem);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poem $poem)
    {
        $data = $request->validate([
            'title' => 'string',
            'bahr_type_id' => 'exists:bahr_types,id',
            'is_hor' => 'boolean'
        ]);
        $this->authorize('owner', $poem);
        $poem->update($data);
        return new PoemResource($poem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poem $poem)
    {

        $this->authorize('owner', $poem);
        $poem->delete();

        return response()->json(['message' => 'Poem deleted successfully', 'resource' => $poem], 200);
    }
}
