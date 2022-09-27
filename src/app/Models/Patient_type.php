<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient_type extends Model
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
    
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function decks()
    {
        return $this->belongsToMany(Deck::class)->withTimestamps();
    }
}
