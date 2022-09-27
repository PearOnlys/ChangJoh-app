<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Deck extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image_path',
        'global',
        'profile_id',
        'deck_order'
    ];
    
    static $rules = [
        'name' => 'required|max:255',
        'profile_id' => 'nullable|exists:profiles,id'
    ];

    public static function validation($id, $profile_id)
    {
        $rules =[];
        if (!$id) {
            // new deck
            if (!$profile_id) {
                //all null
            } else {
                //add to profile
                $rules['name'] = ['required', 'max:255', Rule::unique('decks','name')->where(fn ($query) => $query->where('profile_id', $profile_id))];
                $rules['image'] = ['image','mimes:jpg,png,jpeg,gif,svg,webp'];
        }
     } else {
            // edit deck
            $rules['name'] = ['max:255', Rule::unique('decks','name')->ignore($id)->where(fn ($query) => $query->where('profile_id', $profile_id))];
            $rules['profile_id'] = ['exists:profiles,id'];
            $rules['image'] = ['image','mimes:jpg,png,jpeg,gif,svg,webp'];
        }
        return $rules;
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function cards()
    {
        return $this->belongsToMany(Card::class)->withPivot('card_order','is_hidden')->withTimestamps();
    }
    public function patienttypes()
    {
        return $this->belongsToMany(Patient_type::class)->withTimestamps();
    }
}
