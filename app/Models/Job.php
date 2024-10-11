<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Job extends Model
{
    use HasFactory;

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate([
            'name' => $name
        ]);

        $this->tags()->attach($tag->id);
    }

    public function employer() : BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
