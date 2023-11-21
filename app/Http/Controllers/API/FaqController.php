<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Topic;
use App\Models\Review;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search'); 

        if ($search) {
            $topics = Topic::search($search)->where('is_active', 1)->get();
            $questions = Question::search($search)->where('is_active', 1)->get();
        
            $combinedResults = [$topics, $questions];
        } else {
            $combinedResults =Topic::where('is_active', 1)->get();
        }
        

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data topik berhasil diambil',
            'data' => $combinedResults,
        ], 200);
    }

    public function topic(String $slug)
    {
        $topic = Topic::where('is_active', 1)->first();

        $questions = $topic->questions;

        if(is_null($questions)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }


        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedQuestions = $questions->map(function ($question) {
            $topic = $question->topics->first(); // Asumsikan setiap pertanyaan hanya terkait dengan satu topik
            $likesCount = $question->reviews()->where('likes', 1)->count();
            $dislikesCount = $question->reviews()->where('likes', 0)->count();

            return [
                'id' => $question->id,
                'question' => $question->question,
                'slug' => $question->slug,
                'answer' => $question->answer,
                'likes' => $likesCount,
                'dislikes' => $dislikesCount,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'topics_id' => $topic->id,
                'topics_name' => $topic->name,
                'topics_slug' => $topic->slug,
                'topics_description' => $topic->description,
                'topics_image' => $topic->image,
                'topics_is_active' => $topic->is_active,
            ];
        });


        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedQuestions,
        ], 200);
    }

    public function question(String $name, String $slug)
    {
        $questions = Question::where('is_active', 1)->where('slug', $slug)->with('reviews')->get();

        if(is_null($questions)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }


        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedQuestions = $questions->map(function ($question) {
            $topic = $question->topics->first(); // Asumsikan setiap pertanyaan hanya terkait dengan satu topik
            $likesCount = $question->reviews()->where('likes', 1)->count();
            $dislikesCount = $question->reviews()->where('likes', 0)->count();

            return [
                'id' => $question->id,
                'question' => $question->question,
                'slug' => $question->slug,
                'answer' => $question->answer,
                'likes' => $likesCount,
                'dislikes' => $dislikesCount,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'topics_id' => $topic->id,
                'topics_name' => $topic->name,
                'topics_slug' => $topic->slug,
                'topics_description' => $topic->description,
                'topics_image' => $topic->image,
                'topics_is_active' => $topic->is_active,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedQuestions,
        ], 200);
    }

    public function like(String $name, String $slug)
    {
        $question = Question::where('is_active', 1)->where('slug', $slug)->first();

        if(is_null($question)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        // Insert pertanyaan
        $reviews = Review::create([
            'question_id' => $question->id,
            'likes' => 1,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Review berhasil ditambahkan',
            'data' => $reviews,
        ], 200);
    }

    public function dislike(String $name, String $slug)
    {
        $question = Question::where('is_active', 1)->where('slug', $slug)->first();

        if(is_null($question)) {
            return response()->json([
                'status_code' => 404,
                'status' => 'Error',
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        // Insert pertanyaan
        $reviews = Review::create([
            'question_id' => $question->id,
            'likes' => 0,
        ]);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Review berhasil ditambahkan',
            'data' => $reviews,
        ], 200);
    }

}
