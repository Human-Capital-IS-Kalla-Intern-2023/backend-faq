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

            $combinedResults = $topics->merge($questions);
        } else {
            $combinedResults = Topic::where('is_active', 1)->get();
        }

        $transformedTopic = $combinedResults->map(function ($item) {
            // Assuming $item could be either a Topic or a Question model
            return [
                'topic_id' => $item->id,
                'topic_name' => $item->name,
                'topic_slug' => $item->slug,
                'topic_description' => $item->description,
                'topic_image' => $item->image,
                'topic_icon' => $item->icon,
                'topic_is_active' => $item->is_active,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data topik berhasil diambil',
            'data' => $transformedTopic,
        ], 200);
    }

    public function topic(String $slug)
    {
        $topic = Topic::where('is_status', 1)->first();

        if (is_null($topic)) {
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
                'question' => $question->question,
                'question_slug' => $question->slug,
                'question_answer' => $question->answer,
                'likes' => $likesCount,
                'dislikes' => $dislikesCount,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
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

    public function question(String $name, String $slug)
    {
        $questions = Question::where('is_status', 1)->where('slug', $slug)->with('reviews')->get();

        if (is_null($questions)) {
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
                'question_id' => $question->id,
                'question' => $question->question,
                'question_slug' => $question->slug,
                'question_answer' => $question->answer,
                'likes' => $likesCount,
                'dislikes' => $dislikesCount,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
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

    public function like(String $name, String $slug)
    {
        $question = Question::where('is_status', 1)->where('slug', $slug)->first();

        if (is_null($question)) {
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
        $question = Question::where('is_status', 1)->where('slug', $slug)->first();

        if (is_null($question)) {
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
