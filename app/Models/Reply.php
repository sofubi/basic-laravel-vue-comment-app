<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * Defines what relationships the model returns by default
     *
     * @var array
     */
    protected $with = [
        'sub_replies'
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
     * Return the reply <-> sub_reply relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_replies()
    {
        return $this->hasMany('App\Models\SubReply');
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
