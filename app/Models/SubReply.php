<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubReply extends Model
{
    use HasFactory;

    /**
     * Defines the resources table
     *
     * @var string
     */
    protected $table = 'sub_reply';

    /**
     * Accessors to append to the model's array form
     *
     * @var array
     */
    protected $appends = [
        'username'
    ];

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
