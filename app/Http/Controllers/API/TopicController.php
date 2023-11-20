<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class TopicController extends Controller
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
            'slug' => ['required', 'unique:topics, slug, NULL, id, deleted_at, NULL', 'string'],
            'name' => ['required', 'unique:topics, name, NULL, id, deleted_at, NULL', 'string'],
            'description' => ['required', 'unique:topics, description, NULL, id, deleted_at, NULL', 'string'],
        ]);

        $data = Topic::create([
            'slug' => $validation['slug'],
            'name' => $validation['name'],
            'description' => $validation['description'],
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Topic berhasil ditambahkan',
            'data'  => $data,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $validation = $request->validate([
            'name' => ['required','unique:topics,name,'.$topic->slug.',slug','string'],
            'description' => ['required', 'string'],
        ]);

        DB::beginTransaction();

        try {
            // Ambil pertanyaan yang akan diupdate
            $topic =Topic::where('slug', $topic->slug)->first();
    
            // Update atribut pertanyaan
            $topic->update([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'description' => $request->input('description'),
            ]);

    
            DB::commit();
    
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data topic berhasil diubah',
                'data' => $topic,
            ], 200);
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
    public function destroy(string $id)
    {
        //
    }
}
