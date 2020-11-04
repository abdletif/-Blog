<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'password',
        'is_admin'
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

    /**
     * User  / posts
     */

     public function posts(){
         return $this->hasMany(Post::class);
     }

     /**
     * User / comments
     */

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    /**
     * User / image
     */

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    /**
     * Most Active users in Last Month
     */
    public function scopeMostUserActiveInLastMonth($query){
        return $query->withCount(["posts" => function($q) {
                            $q->whereBetween('created_at',[now()->subMonth(1),now()]);
                         }])
                        ->orderBy("posts_count","DESC");
    }
    /**
     *  Active Users
     */
    public function scopeActiveUsers($query){
        return $query->withCount("posts")->orderBy("posts_count","DESC");
    }
}
