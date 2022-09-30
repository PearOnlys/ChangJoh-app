<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientType extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    static $rules = [
        'name' => 'required|unique:patient_types,name|max:255',
    ];

    static $msg = [
        'required' => 'The :attribute field is required.',
        'unique' => 'The :attribute field must be unique.',
        'max' => 'The :attribute must be smaller than :max.'
    ];
    
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function decks()
    {
        return $this->belongsToMany(Deck::class)->withTimestamps();
    }
}
