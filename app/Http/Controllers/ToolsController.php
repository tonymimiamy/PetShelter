<?php

namespace App\Http\Controllers;
use App\Libary\PetLibary;
use Illuminate\Http\Request;
use App\Shelter;
use App\PublicPet;


class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $url = "https://data.coa.gov.tw/Service/OpenData/TransService.aspx?UnitId=QcbUEzN6E6DL";
        // PetLibary::get_publicpet($url);
        $shelters = Shelter::all()
                           ->mapWithKeys(function($item) {
                                $item->city = mb_substr($item->shelter_name, 0, 2);
                                return [$item->city => $item];
                           });
                           
        $publicPets = PublicPet::with(['pet'])
                               ->get();

        foreach($publicPets as $publicPet) {
            if($publicPet->pet) {
                if(isset($shelters[$publicPet->pet->animal_place])) {
                $publicPet->shelter_id = $shelters[$publicPet->pet->animal_place]->shelter_id;
                $publicPet->save();
             }
            }
            
        }
                        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
