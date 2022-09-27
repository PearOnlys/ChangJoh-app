<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Profile extends Model
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
        'user_id',
    ];
    public static function validation($id = null)
    {
        $rules =[];
        if (!$id) {
            $rules['name'] = ['required', 'max:255', Rule::unique('profiles','name')->where(fn ($query) => $query->where('user_id',Auth::user()->id))];
            $rules['type_id'] = ['required', 'exists:patient_types,id'];
            $rules['image'] = ['image', 'mimes:jpg,png,jpeg,gif,svg,webp'];
        } else {
            $rules['name'] = ['max:255', Rule::unique('profiles','name')->ignore($id)->where(fn ($query) => $query->where('user_id',Auth::user()->id))];
            $rules['type_id'] = ['exists:patient_types,id'];
            $rules['image'] = ['image', 'mimes:jpg,png,jpeg,gif,svg,webp'];
        }
        return $rules;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function decks()
    {
        return $this->hasMany(Deck::class);
    }
    public function patientTypes()
    {
        return $this->belongsTo(Patient_type::class);
    }
    public function cards()
    {
        return $this->belongsToMany(Card::class)->withPivot('image_path','audio_path')->withTimestamps();
    }
}
