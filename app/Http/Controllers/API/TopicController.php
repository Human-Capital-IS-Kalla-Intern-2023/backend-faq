<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $topics = Topic::search($search)->get();

            $topics->load('user');
        } else {
            $topics = Topic::with('user')->get();
        }

        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        // $transformedTopics = $topics->map(function ($topic) {

        //     return [
        //         'topic_id' => $topic->id,
        //         'topic_user_id' => $topic->user_id,
        //         'topic_author' => $topic->user->name,
        //         'topic_name' => $topic->name,
        //         'topic_slug' => $topic->slug,
        //         'topic_description' => $topic->description,
        //         'topic_image' => $topic->image,
        //         'topic_icon' => $topic->icon,
        //         'topic_is_status' => $topic->is_status,
        //         'topic_created_at' => $topic->created_at,
        //         'topic_updated_at' => $topic->updated_at,
        //     ];
        // });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $topics,
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
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:1024'],
            'icon' => ['nullable', 'string'],
            'is_status' => ['nullable', 'boolean'],
        ]);

        $imageName = "";
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            // Simpan gambar di folder Storage:
            $request->image->storeAs('public/topic_image', $imageName);
        }

        $data = Topic::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'image' => $imageName,
            'icon' => $request->input('icon'),
            'is_status' => $request->input('is_status'),
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
    public function show(String $slug)
    {
        // $topics = Topic::where('is_status', 1)->where('slug', $slug)->with('questions', 'user');

        $topics = Topic::where('is_status', 1)
            ->where('slug', $slug)
            ->with([
                'questions' => function ($query) {
                    $query->with('user', 'reviews'); // Mengambil data pertanyaan, user, dan reviews
                },
                'user'
            ],)
            ->get();

        if (is_null($topics)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        foreach ($topics as $topic) {
            foreach ($topic->questions as $question) {
                $likes = $question->reviews->where('likes', 1)->count();;
                $dislikes = $question->reviews->where('likes', 0)->count();

                // Menambahkan informasi likes dan dislikes ke dalam data pertanyaan
                $question->likes = $likes;
                $question->dislikes = $dislikes;
            }
        }

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $topics,
        ], 200);
    }



    public function edit(String $slug)
    {
        $topics = Topic::where('is_status', 1)->where('slug', $slug)->with('user')->get();

        if ($topics->isEmpty()) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        // $transformedTopics = $topics->map(function ($topic) {

        //     return [
        //         'topic_id' => $topic->id,
        //         'topic_user_id' => $topic->user_id,
        //         'topic_author' => $topic->user->name,
        //         'topic_name' => $topic->name,
        //         'topic_slug' => $topic->slug,
        //         'topic_description' => $topic->description,
        //         'topic_image' => $topic->image,
        //         'topic_icon' => $topic->icon,
        //         'topic_is_active' => $topic->is_active,
        //         'topic_created_at' => $topic->created_at,
        //         'topic_updated_at' => $topic->updated_at,
        //     ];
        // });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $topics,
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $topic = Topic::where('slug', $slug)->first();

        $validation = $request->validate([
            'name' => [
                'required',
                Rule::unique('topics', 'name')->ignore($topic->id),
                'string'
            ],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:1024'],
            'icon' => ['nullable', 'string'],
            'is_status' => ['nullable', 'boolean'],
        ]);

        $imageName = "";
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            // Simpan gambar di folder Storage:
            $request->image->storeAs('public/topic_image', $imageName);
        }

        $data = Topic::where('slug', $slug)->update([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'image' => $imageName,
            'icon' => $request->has('icon') ? $request->input('icon') : $topic->icon,
            'is_status' => $request->input('is_status'),
        ]);


        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Topic berhasil diperbarui',
            'data' => $data,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {

        $topic = Topic::where('slug', $slug)->first();

        if (is_null($topic)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'error',
                'message' => 'Data Not Found',
            ], 404);
        }

        // Periksa apakah ada relasi (comment) yang masih ada
        if ($topic->questions()->count() > 0) {
            return response()->json([
                'status_code' => 500,
                'status' => 'error',
                'message' => 'Topic tidak dapat dihapus karena masih memiliki pertanyaan',
            ], 500);
        }

        // Hapus gambar dari penyimpanan
        if ($topic->image) {
            Storage::delete('public/topic_image' . $topic->image);
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

    public function updateIsActive(Request $request, String $slug)
    {
        $validation = $this->validate($request, [
            'is_status' => 'required|boolean',
        ]);

        $topic = Topic::where('slug', $slug)->first();

        $topic->update([
            'is_status' => $request->is_status,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => $topic->is_status . ' berhasil diubah',
            'data' => $topic,
        ], 200);
    }
}
