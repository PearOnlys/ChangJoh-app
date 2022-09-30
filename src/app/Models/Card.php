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
    
    protected $casts = [
        'is_hidden' => 'boolean'
    ];

    public function getImagepathAttribute($image_path){
        if (!empty($image_path)){
            return '/storage/'.$image_path;
        } else {
            return $image_path;
        }
    }

    public function getAudiopathAttribute($audio_path){
        if (!empty($audio_path)){
            return '/storage/'.$audio_path;
        } else {
            return $audio_path;
        }
    }

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
    
    static $msg = [
        'required' => 'The :attribute field is required.',
        'unique' => 'The :attribute field must be unique.',
        'max' => 'The :attribute must be smaller than :max.',
        'exists' => 'The :attribute must exists.',
        'mimes' => 'The :attribute must be :mimes.'
    ];

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
