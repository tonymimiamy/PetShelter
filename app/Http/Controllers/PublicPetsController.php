<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\PublicPet;
use App\Shelter;
class PublicPetsController extends Controller
{
    public function index(Request $request)
    {
        $shelters = Shelter::all();
        $pets = Pet::with(['publicpet', 'publicpet.shelter']);
        if(isset($request['animal_type']) && $request['animal_type']) {
            $pets = $pets->where('animal_type', $request['animal_type']);
        }
        if(isset($request['animal_sex']) && $request['animal_sex']) {
            $pets = $pets->where('animal_sex', $request['animal_sex']);
        }
        if(isset($request['shelter_id']) && $request['shelter_id']) {
            $pets = $pets->whereHas('publicpet', function($query) use($request){
                $query->whereHas('shelter', function($cQuery) use($request){
                    $cQuery->where('shelter_id', $request['shelter_id']);
                });
            });
        }else{
            $pets = $pets->whereHas('publicpet');
        }

        $pets = $pets->paginate(8);   
        $params = collect(request()->all());        
        return view('publicpets.index',['pets' => $pets, 'shelters' => $shelters, 'params' => $params]);
    }

    public function store(Request $request)
    {
        $pet = New pet;
        $pet->animal_name = $request['animal_name'];
        $pet->animal_breed = $request['animal_breed'];
        $pet->animal_type = $request['animal_type'];
        $pet->animal_sex = $request['animal_sex'];
        $pet->animal_size = $request['animal_size'];
        $pet->animal_colour = $request['animal_colour'];
        $pet->animal_age = $request['animal_age'];
        $pet->animal_ligation = $request['animal_ligation'];
        $pet->animal_place = $request['animal_place'];
        $pet->animal_description = $request['animal_description'];
        $pet->animal_img = $request['animal_img'];
        $pet->save();

        $publicpet = new PublicPet;
        $publicpet->pet_id = $pet->id;
        $publicpet->animal_opendate = $request['animal_opendate'];
        $publicpet->save();
    }

    public function show(PublicPet $publicpet)
    {
        $pet = Pet::where('id', $publicpet->pet_id)
                  ->first();
        return view('publicpets.show',['publicpet'=>$publicpet, 'pet'=> $pet]);
    }
}
