<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class NormalPet extends Model
{
    protected $primaryKey = 'normal_pet_id';
    protected $table = 'normal_pets';

    protected $fillable = ['normal_pet_id', 'reason', 'approval_status' , 'user_id', 'status'];       
    
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
