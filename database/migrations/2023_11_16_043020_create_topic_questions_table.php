<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topic_questions', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('question_id');
            $table->timestamps();


            // Definisi foreign key
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            
            // Kunci gabungan sebagai kunci primer
            $table->primary(['topic_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_questions');
    }
};
