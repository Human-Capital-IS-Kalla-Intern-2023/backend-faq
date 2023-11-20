<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            'name' => ['required', 'unique:topics,name', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required','image','mimes:png,jpg,jpeg,svg','max:1024'],
        ]);

        $imageName = time().'.'.$request->image->extension(); 
        
        // Simpan gambar di folder Storage:
        $request->image->storeAs('images', $imageName);

        $data = Topic::create([
            'name' => $validation['name'],
            'slug' => Str::slug($validation['name']),
            'description' => $validation['description'],
            'image' => $imageName,
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
    public function show(Topic $topic)
    {
        $topic =Topic::where('slug', $topic->slug)->with('questions')->first();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data topic berhasil diambil',
            'data' => $topic,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $validation = $request->validate([
            'name' => ['required','unique:topics,name,'.$topic->slug.',slug','string'],
            'description' => ['required', 'string'],
            'image' => ['required','image','mimes:png,jpg,jpeg,svg','max:1024'],

        ]);

        DB::beginTransaction();

        try {
            // Ambil pertanyaan yang akan diupdate
            $topic =Topic::where('slug', $topic->slug)->first();
    
            $topic->name = $request->input('name');
            $topic->description = $request->input('description');
        
            // Mengelola gambar jika diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar dari penyimpanan
                if ($topic->image) {
                    Storage::delete('public/images/' . $topic->image);
                }

                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
                $image->storeAs('images', $imageName);
                $topic->image = $imageName;
            }
        
            $topic->save();


    
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
    public function destroy(Topic $topic)
    {

        $topic =Topic::where('slug', $topic->slug)->first();

            // Hapus gambar dari penyimpanan
        if ($topic->image) {
            Storage::delete('public/images/' . $topic->image);
        }

        // Hapus data dari database
        $topic->delete();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data topic berhasil dihapus',
            'data' => $topic,
        ], 200);
    }
}
