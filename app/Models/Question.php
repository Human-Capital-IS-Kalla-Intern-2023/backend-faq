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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'question' => $this->question,
            'answer' => $this->answer,
            // Add other searchable attributes as needed
        ];
    }

}
