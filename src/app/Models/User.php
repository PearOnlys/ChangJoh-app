<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mobile',
        'password'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mobile_verified_at' => 'datetime',
    ];
    public static function validation($id,$note = null)
    {
        $rules = [];
        if (!$id) {
            if ($note == 'reg') {
                $rules['mobile'] = ['required','size:10','unique:users,mobile'];
            } elseif ($note == 'login') {
                $rules['mobile'] = ['required','size:10','exists:users,mobile'];
            }
        } else {
            //edit
            $rules['mobile'] = ['size:10',Rule::unique('users','mobile')->ignore($id)];
        }
        return $rules;
    }

    public function findForPassport($username)
    {
        return $this->where('mobile', $username)->first();
    }
    public function validateForPassportPasswordGrant($password)
    {
        return true;
    }
    
    /* Relation */
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
