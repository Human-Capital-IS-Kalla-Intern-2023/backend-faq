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

        $results = "";

        if ($search) {

            $questions = Question::search($search)->where('is_status', 1)->get();

            // Memuat relasi topics untuk setiap pertanyaan
            $questions->load('topics');

            // Transformasi hasil untuk mencocokkan format yang Anda inginkan
            $results = $questions->map(function ($question) {
                $topic = $question->topics->first(); // Asumsikan setiap pertanyaan hanya terkait dengan satu topik
                $likesCount = $question->reviews()->where('likes', 1)->count();
                $dislikesCount = $question->reviews()->where('likes', 0)->count();

                return [
                    'question_id' => $question->id,
                    'question_user_id' => $question->user_id,
                    'question_name' => $question->question,
                    'slug' => $question->slug,
                    'question_answer' => $question->answer,
                    'question_likes' => $likesCount,
                    'question_dislikes' => $dislikesCount,
                    'question_is_status' => $question->is_status,
                    'created_at_question' => $question->created_at,
                    'updated_at_question' => $question->updated_at,
                    'topic_user_id' => $topic->user_id,
                    'topic_id' => $topic->id,
                    'topic_name' => $topic->name,
                    'slug' => $topic->slug,
                    'topic_description' => $topic->description,
                    'topic_image' => $topic->image,
                ];
            });
        } else {
            $combinedResults = Topic::where('is_status', 1)->get();

            $results = $combinedResults->map(function ($item) {
                // Assuming $item could be either a Topic or a Question model
                return [
                    'topic_id' => $item->id,
                    'topic_name' => $item->name,
                    'topic_slug' => $item->slug,
                    'topic_description' => $item->description,
                    'topic_image' => $item->image,
                    'topic_icon' => $item->icon,
                    'topic_is_status' => $item->is_status,
                    'topic_created_at' => $item->created_at,
                    'topic_updated_at' => $item->updated_at,
                ];
            });
        }


        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data topik berhasil diambil',
            'data' => $results,
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
                'question_name' => $question->question,
                'slug' => $question->slug,
                'question_answer' => $question->answer,
                'question_likes' => $likesCount,
                'question_dislikes' => $dislikesCount,
                'question_created_at' => $question->created_at,
                'question_updated_at' => $question->updated_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
                'topic_icon' => $topic->icon,
                'topic_is_status' => $topic->is_status,
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
                'question_name' => $question->question,
                'slug' => $question->slug,
                'question_answer' => $question->answer,
                'question_likes' => $likesCount,
                'question_dislikes' => $dislikesCount,
                'question_created_at' => $question->created_at,
                'question_updated_at' => $question->updated_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
                'topic_is_status' => $topic->is_status,
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
