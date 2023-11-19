<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Scout\Searchable;

class Question extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_questions')->withTimestamps();;
    }

    public function toSearchableArray(): array
    {
        return [
            'question' => $this->question,
            'answer' => $this->answer,
            // Add other searchable attributes as needed
        ];
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
