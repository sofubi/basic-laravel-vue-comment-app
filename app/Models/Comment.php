<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];

    /**
     * Defines what relationships the model returns by default
     *
     * @var array
     */
    protected $with = [
        'replies'
    ];

    /**
     * Accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'username'
    ];

    /**
     * Return the comment <-> reply relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    /**
     * Return the comment <-> user relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Returns associated user's name
     *
     * @return string
     */
    public function getUsernameAttribute()
    {
        return $this->user->name;
    }
}
