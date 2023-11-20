<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $topic = Topic::query()->when($search, function ($query) use ($search) {
            $query->where('slug', 'LIKE', "%" . $search . "%");
        })->get();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Topic berhasil diambil',
            'data' => $topic,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'unique:topics, name, NULL, id, deleted_at, NULL', 'string'],
            'description' => ['required', 'unique:topics, description, NULL, id, deleted_at, NULL', 'text'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        DB::beginTransaction();

        try {
            $topic = new Topic();
            $topic->name = $request->input('name');
            $topic->slug = Str::slug($request->input('slug'));
            $topic->description = $request->input('description');

            // Encode image to Base64
            $image = $request->file('image');
            $encoded_image = base64_encode(file_get_contents($image));


            // Save encoded image to the database
            $topic->image = $encoded_image;

            $topic->save();

            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Topic berhasil ditambahkan',
                'data'  => $topic,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status_code' => 500,
                'status' => 'Error',
                'message' => 'Data gagal ditambahkan',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $topic = Topic::where('slug', $topic->slug)->with('questions')->get();

        $transformedTopic = $topic->map(function ($topic) {
            $question = $topic->questions->first();

            return [
                'id' => $topic->id,
                'name' => $topic->name,
                'slug' => $topic->slug,
                'description' => $topic->description,
                'image' => $topic->image,

            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedTopic,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $validation = $request->validate([
            'name' => ['required', 'unique:topics, name, NULL, id, deleted_at, NULL', 'string'],
            'description' => ['required', 'unique:topics, description, NULL, id, deleted_at, NULL', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        DB::beginTransaction();

        try {
            $topic = Topic::where('slug', $topic->slug)->first();

            $topic->update([
                'topic_name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'description' => $request->input('desctiption'),
                'image' => $request->input('image'),
            ]);

            // Encode image to Base64
            $image = $request->file('image');
            $encoded_image = base64_encode(file_get_contents($image));

            // Save encoded image to the database
            $topic->image = $encoded_image;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            // Handle the exception, log it, or return an error response
            return response()->json([
                'status_code' => 500,
                'status' => 'Error',
                'message' => 'Data gagal diubah',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $topic = Topic::where('slug', $topic->slug)->first();
        $topic->delete();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data berhasi dihapus',
            'data' => $topic,
        ], 200);
    }
}
