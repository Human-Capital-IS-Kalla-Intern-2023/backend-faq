<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_questions');
    }

    public function addLike()
    {
        $this->increment('likes');
    }

    public function removeLike()
    {
        $this->decrement('likes');
    }

    public function addDislike()
    {
        $this->increment('dislikes');
    }

    public function removeDislike()
    {
        $this->decrement('dislikes');
    }
}
