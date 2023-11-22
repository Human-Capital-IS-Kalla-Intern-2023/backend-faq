<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->get('search');

        if ($search) {
            $questions = Question::search($search)->get();

            // Memuat relasi topics untuk setiap pertanyaan
            $questions->load('topics');
        } else {
            $questions = Question::with('topics')->get();
        }

        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedQuestions = $questions->map(function ($question) {
            $topic = $question->topics->first(); // Asumsikan setiap pertanyaan hanya terkait dengan satu topik

            return [
                'id' => $question->id,
                'question' => $question->question,
                'question_slug' => $question->slug,
                'question_answer' => $question->answer,
                'likes' => $question->likes,
                'dislikes' => $question->dislikes,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'deleted_at' => $question->deleted_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedQuestions,
        ], 200);
    }

    public function show(Question $question)
    {
        $questions = Question::where('slug', $question->slug)->with('topics')->get();

        // Transformasi hasil untuk mencocokkan format yang Anda inginkan
        $transformedQuestions = $questions->map(function ($question) {
            $topic = $question->topics->first(); // Asumsikan setiap pertanyaan hanya terkait dengan satu topik

            return [
                'id' => $question->id,
                'question' => $question->question,
                'question_slug' => $question->slug,
                'question_answer' => $question->answer,
                'likes' => $question->likes,
                'dislikes' => $question->dislikes,
                'created_at' => $question->created_at,
                'updated_at' => $question->updated_at,
                'deleted_at' => $question->deleted_at,
                'topic_id' => $topic->id,
                'topic_name' => $topic->name,
                'topic_slug' => $topic->slug,
                'topic_description' => $topic->description,
                'topic_image' => $topic->image,
            ];
        });

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data pertanyaan berhasil diambil',
            'data' => $transformedQuestions,
        ], 200);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'question' => ['required', 'unique:questions,question', 'string'],
            'answer' => ['required'],
            'topic_id' => ['array', 'exists:topics,id,deleted_at,NULL']
        ]);

        DB::beginTransaction();

        try {
            $question = new Question();
            $question->question = $request->input('question');
            $question->slug = Str::slug($request->input('question'));
            $question->answer = $request->input('answer');
            $question->save();

            $topicIds = $request->input('topic_id');
            // Attach each topic to the question
            $question->topics()->sync($topicIds);


            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data pertanyaan berhasil diambil',
                'data' => $question,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status_code' => 500,
                'status' => 'Error',
                'message' => 'Data gagal ditambahkan',
            ], 500);
        }
    }

    public function update(Request $request, Question $question)
    {

        $validation = $request->validate([
            'question' => ['required', 'unique:questions,question,' . $question->slug . ',slug', 'string'],
            'answer' => ['required'],
            'topic_id' => ['array', 'exists:topics,id,deleted_at,NULL']
        ]);

        DB::beginTransaction();

        try {
            // Ambil pertanyaan yang akan diupdate
            $question = Question::where('slug', $question->slug)->first();

            // Update atribut pertanyaan
            $question->update([
                'question' => $request->input('question'),
                'slug' => Str::slug($request->input('question')),
                'answer' => $request->input('answer'),
            ]);

            // Ambil id topik yang baru dari form
            $topicIds = $request->input('topic_id');

            $question->topics()->sync($topicIds);


            DB::commit();

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'Data pertanyaan berhasil diubah',
                'data' => $question,
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

    public function destroy(Question $question)
    {
        $question = Question::where('slug', $question->slug)->first();
        $question->delete();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => 'Data berhasi dihapus',
            'data' => $question,
        ], 200);
    }
}
