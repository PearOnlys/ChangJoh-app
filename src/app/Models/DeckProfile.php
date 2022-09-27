<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class DeckProfile extends Model
{
    use HasFactory, SoftDeletes;
    public static function validation($deck_id, $profile_ids)
    {
        $rules = [];
        if (!$deck_id) {
            //no deck to move/copy
        } else {
            if (!$profile_ids) {
                //no profile to move/copy to
            } else {
                $rules['name'] = ['required', 'max:255', Rule::unique('decks', 'name')->where(fn ($query) => $query->where('profile_id', $profile_ids))];
                $rules['profile_id'] = ['exists:profiles,id'];
                $rules['image'] = ['image', 'mimes:jpg,png,jpeg,gif,svg,webp'];
            }
        }
        return $rules;
    }
}
