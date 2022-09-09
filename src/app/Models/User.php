<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'mobile',
        'password',
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

    public function findForPassport($username)
    {
        return $this->where('mobile', $username)->first();
    }

    static $rulesLogin = [
        'mobile' => 'required|size:10',
        'password' => 'required|min:6',
    ];
    static $rulesNew = [
        'name' => 'required|max:255',
        'mobile' => 'size:10|required|unique:users,mobile',
        'password' => 'required|min:6'
    ];
    static $rulesMobile = [
        'mobile' => 'exists:users,mobile|required|size:10',
    ];

    public static function validation($id = null)
    {
        $rules =[];
        if (!$id) {
            $rules['name'] = ['unique:users,name','max:255'];
            $rules['mobile'] = ['require','unique:users,mobile'];
            $rules['password'] = ['require','min:6'];
        } else {
            $rules['name'] = ['unique:users,name,'.$id];
            $rules['mobile'] = ['unique:users,mobile,'.$id];
            $rules['password'] = ['min:6'];
        }
        return $rules;
    }
}
