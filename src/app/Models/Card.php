<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Card extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'word',
        'image_path',
        'global'
    ];

    static $rulesNew = [
        'word' => 'required|max:255',
        'image' => 'image|mimes:jpg,png,jpeg,gif,svg,webp',
    ];
    public static function validation($id)
    {
        $rules = [];
        if (!$id) {
            //new card
            $rules['word'] = ['required', 'max:255'];
            $rules['image'] = ['required', 'image','mimes:jpg,png,jpeg,gif,svg,webp'];
            $rules['audio'] = ['mimes:mp3,mpga,wav,ogg'];
        } else {
            //edit card
            $rules['word'] = ['max:255'];
            $rules['image'] = ['image','mimes:jpg,png,jpeg,gif,svg,webp'];
            $rules['audio'] = ['mimes:mp3,mpga,wav,ogg'];
        }
        return $rules;
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function decks()
    {
        return $this->belongsToMany(Deck::class)->withPivot('card_order', 'is_hidden')->withTimestamps();
    }
    public function profiles()
    {
        return $this->belongsToMany(Profile::class)->withPivot('image_path','audio_path')->withTimestamps();
    }
}
