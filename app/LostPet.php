<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class LostPet extends Model
{
    protected $primaryKey = 'lost_pet_id';
    protected $table = 'lost_pets';
    protected $fillable = ['lost_pet_id', 'lost_time', 'lost_place', 'user_id','approval_status', 'status'];
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }
        public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
