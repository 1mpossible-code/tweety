<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub('select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function getImageAttribute($value)
    {
        return $value ? asset("storage/images/{$value}") : $value;
    }

    public function getPathAttribute()
    {
        return asset('tweets/'.$this->id);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }
}
