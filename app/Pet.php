<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['animal_breed','animal_type', 'animal_name', 'animal_sex', 'animal_size', 'animal_colour', 'animal_age', 'animal_img', 'animal_ligation', 'animal_place', 'animal_description'];


    public function normalpet()
    {
        return $this->belongsTo(NormalPet::class, 'id', 'pet_id');
    }
    public function lostpet()
    {
        return $this->belongsTo(LostPet::class, 'id', 'pet_id');
    }

    public function publicpet()
    {
        return $this->belongsTo(PublicPet::class, 'id', 'pet_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'pet_id', 'id');
    }
}
