<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Scout\Searchable;

class Topic extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = ['name', 'slug', 'description', 'image'];

    protected $guarded = [];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'topic_questions')->withTimestamps();;
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
