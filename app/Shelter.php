<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    protected $table = 'shelters';
    protected $fillable = ['shelter_id', 'shelter_name', 'shelter_tel', 'shelter_address'];

    public function publicpet()
    {
        return $this->belongsTo (PublicPet::class,'shelter_id', 'shelter_id');
    }
}
