<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Scout\Searchable;

class Topic extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($topic) {
            // Cek apakah topik memiliki relasi Many-to-Many dengan tabel pertanyaan
            if ($topic->questions()->count() > 0) {
                // Jika ada, batalkan penghapusan dan kembalikan pesan kesalahan
                throw new \Exception('Topik tidak dapat dihapus karena masih terkait dengan pertanyaan.');
            }
        });
    }

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
