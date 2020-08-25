<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    // protected $filable = ['pet_id', 'name', 'comment'];

     public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }
        public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
