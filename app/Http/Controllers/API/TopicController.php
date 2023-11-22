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
        if ($search) {
            $topics = Topic::search($search)->where('is_active', 1)->get();
        } else {
            $topics = Topic::where('is_active', 1)->get();
        }

         // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedTopics = $topics->map(function ($topic) {

            return [
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
                'topic_icon' => $topic->icon,
                'topic_is_active' => $topic->is_active,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedTopics,
        ], 200);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data Topic berhasil diambil',
            'data' => $topics,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validation = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'topic_name' => ['required', 'unique:topics,name', 'string'],
            'topic_description' => ['required', 'string'],
            'topic_image' => ['nullable','image', 'mimes:png,jpg,jpeg,svg', 'max:1024'],
            'topic_icon' => ['nullable', 'string'],
            'topic_is_status' => ['nullable', 'boolean'],
        ]);

        $imageName = time() . '.' . $request->topic_image->extension();

        // Simpan gambar di folder Storage:
        $request->topic_image->storeAs('images', $imageName);

        $data = Topic::create([
            'user_id' => $request->input('user_id'),
            'name' => $request->input('topic_name'),
            'slug' => Str::slug($request->input('topic_name')),
            'description' => $request->input('topic_description'),
            'image' => 'images/'.$imageName,
            'icon' => $request->input('topic_icon'),
            'is_status' => $request->input('topic_is_status'),
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
        $topic = Topic::where('is_active', 1)->where('slug', $slug)->first();

        if(is_null($topic)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        $questions = $topic->questions;

        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedQuestions = $questions->map(function ($question) {
            $topic = $question->topics->first(); // Asumsikan setiap pertanyaan hanya terkait dengan satu topik
            $likesCount = $question->reviews()->where('likes', 1)->count();
            $dislikesCount = $question->reviews()->where('likes', 0)->count();

            return [
                'question_id' => $question->id,
                'question_name' => $question->question,
                'question_slug' => $question->slug,
                'question_answer' => $question->answer,
                'question_likes' => $likesCount,
                'question_dislikes' => $dislikesCount,
                'question_created_at' => $question->created_at,
                'question_updated_at' => $question->updated_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
                'topic_icon' => $topic->icon,
                'topic_is_active' => $topic->is_active,
            ];
        });


        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedQuestions,
        ], 200);
    }


    public function edit(String $slug) {
        $topics = Topic::where('is_active', 1)->where('slug', $slug)->get();

        if(is_null($topics)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedTopics = $topics->map(function ($topic) {

            return [
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
                'topic_icon' => $topic->icon,
                'topic_is_active' => $topic->is_active,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedTopics,
        ], 200);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $validation = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'topic_name' => ['required', 'unique:topics,name,' . $topic->slug . ',slug', 'string'],
            'topic_description' => ['required', 'string'],
            'topic_image' => ['nullable','image', 'mimes:png,jpg,jpeg,svg', 'max:1024'],
            'topic_icon' => ['nullable', 'string'],
            'topic_is_status' => ['nullable', 'boolean'],

        ]);

        DB::beginTransaction();

        try {
            // Ambil pertanyaan yang akan diupdate
            $topic = Topic::where('slug', $topic->slug)->first();

            $topic->user_id = $request->input('user_id');
            $topic->name = $request->input('topic_name');
            $topic->slug = $request->input('topic_name');
            $topic->description = $request->input('topic_description');

            // Mengelola gambar jika diunggah
            if ($request->hasFile('topic_image')) {
                // Hapus gambar dari penyimpanan
                if ($topic->image) {
                    Storage::delete('public/images/' . $topic->image);
                }

                $image = $request->file('image');
                $imageName = 'images/' . time() . '.' . $image->extension();
                $image->storeAs('images', $imageName);
                $topic->image = $imageName;
            }
            $topic->is_status = $request->input('topic_is_status');
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

        $topic = Topic::where('slug', $topic->slug)->first();

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
