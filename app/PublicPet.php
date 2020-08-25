<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicPet extends Model
{
    protected $table = 'public_pets';
    protected $primaryKey = 'public_pet_id';
    protected $fillable = ['public_pet_id', 'animal_opendate'];
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

    public function shelter()
    {
        return $this->belongsTo(Shelter::class, 'shelter_id', 'shelter_id');
    }
}
