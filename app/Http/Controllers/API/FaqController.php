<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Topic;
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
            $topics = Topic::search($search)->get();
            $questions = Question::search($search)->get();
        
            $combinedResults = $topics->merge($questions);
        } else {
            $combinedResults =Topic::get();
        }
        // $topics = Topic::all();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data topik berhasil diambil',
            'data' => $combinedResults,
        ], 200);
    }

    public function topic(Topic $topic)
    {

        $questions = $topic->questions;

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $questions,
        ], 200);
    }

    public function question(Topic $topic, Question  $question)
    {

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $question,
        ], 200);
    }

    public function like(Topic $topic,Question  $question)
    {
        $question->addLike();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $question,
        ], 200);
    }

    public function dislike(Topic $topic, Question  $question)
    {
        $question->addDislike();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $question,
        ], 200);
    }

}
