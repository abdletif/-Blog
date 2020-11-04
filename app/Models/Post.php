<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable=[
        'title',
        'content',
        'user_id'
    ];

    /**
     * Post / User
     */
    public function user(){
        return $this->belongsTo(User::class);
    }


    /**
     * Post / Comment
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * Post / Comment
     */
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Post / Image
     */
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    /**
     * Popular Posts
     */
    public function scopePopularPosts($query){
        return $query->withCount("comments")->with('comments','user','tags','image')->orderBy('created_at','DESC');
    }
}
