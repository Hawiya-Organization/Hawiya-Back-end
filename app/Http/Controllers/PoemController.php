<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Resources\PoemResource;
use App\Models\Bayt;
use App\Models\Poem;
use App\Models\User;
use Illuminate\Http\Request;

use App\Actions\Query\Filter;
use App\Http\Resources\BaytResource;

class PoemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Poem::query();
        $query = Filter::apply($query);
        return  PoemResource::collection($query->paginate());
    }


    public function search()
    {
        $prompt = request()->get('prompt');
        $ids = Http::post('http://search/search', [
            'prompt' => $prompt
        ])->json();






        $bayts = Bayt::whereIn('id', $ids)->get();
        return BaytResource::collection($bayts);
    }



    public function store(Request $request)
    {
        /**
         * @var User $user
         */
        $user = request()->user();
        $data = $request->validate([
            'title' => 'required|string',
            'bahr_type_id' => 'exists:bahr_types,id',
            'kafiya_id' => 'exists:kafiyas,id',
            'is_hor' => 'required|boolean',
            'bayts' => 'required|array',
            'bayts.*.content.sadr' => 'string',
            'bayts.*.content.ajoz' => 'string',
            'bayts.*.content.number' => 'required|integer|distinct' // the line number
        ]);
        if (!$data['is_hor']) {

            $request->validate([
                'bayts.*.content.sadr' => 'string|required',
                'bayts.*.content.ajoz' => 'string|required',

            ]);
        }

        $poem = $user->poems()->create($data);


        $bayts = $data['bayts'];

        foreach ($bayts as $bayt) {
            $poem->bayts()->create(['content' => json_encode($bayt['content'])]);
        }
        $poem->load('bayts');
        return new PoemResource($poem);
    }

    public function show(Poem $poem)
    {
        $poem->load('bayts');
        return new PoemResource($poem);
    }


    public function save(Poem $poem)
    {
        /**
         * @var User $user
         */
        $user = request()->user();

        $user->savedPoems()->attach($poem);

        return new PoemResource($poem);
    }

    public function unsave(Poem $poem)
    {
        /**
         * @var User $user
         */
        $user = request()->user();

        $user->savedPoems()->detach($poem);

        return new PoemResource($poem);
    }


    public function myPoems()
    {
        /**
         * @var User $user
         */
        $user = request()->user();

        return PoemResource::collection($user->poems()->paginate());
    }

    public function savedPoems()
    {
        /**
         * @var User $user
         */
        $user = request()->user();

        return PoemResource::collection($user->savedPoems()->paginate());
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
