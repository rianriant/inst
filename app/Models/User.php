<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use App\Models\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'age',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    protected static function boot() {
        
        parent::boot(); // обращение к методу родителя

        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->name
            ]);
        });
    }

    public function following() {
        return $this->belongsToMany(Profile::class);
    }

    public function liked() {
        return $this->belongsToMany(Post::class);
    }
}
