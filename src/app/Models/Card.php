<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'image',
    ];
    
    static $rulesNew = [
        'word' => 'required|max:255',
        'image' => 'image|mimes:jpg,png,jpeg,gif,svg,webp',
    ];

    public function decks()
    {
        return $this->belongsToMany(Card::class);
    }
}
