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
     * Return the reply <-> sub_reply relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sub_replies()
    {
        return $this->hasMany('App\Models\SubReply');
    }
}
